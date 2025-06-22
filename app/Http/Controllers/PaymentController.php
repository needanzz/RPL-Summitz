<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Generate Snap Token Midtrans
     */
    public function createTransaction(Request $request)
{
    $booking = Booking::findOrFail($request->booking_id);

    $order_id = 'ORDER-'.$booking->id.'-'.time();
    $gross_amount = $booking->total_price;

    $params = [
        'transaction_details' => [
            'order_id' => $order_id,
            'gross_amount' => $gross_amount,
        ],
        'customer_details' => [
            'first_name' => $booking->customer_name,
            'email' => $booking->customer_email,
        ],
        'item_details' => [[
            'id' => $booking->id,
            'price' => $gross_amount,
            'quantity' => 1,
            'name' => 'Booking trip '.$booking->id,
        ]],
    ];

    $snap_token = \Midtrans\Snap::getSnapToken($params);

    Payment::create([
        'booking_id' => $booking->id,
        'transaction_id' => null,
        'order_id' => $order_id,
        'payment_method' => 'midtrans',
        'payment_status' => 'pending',
        'gross_amount' => $gross_amount,
    ]);

    return response()->json(['snap_token' => $snap_token]);
}


    /**
     * Simpan data transaksi setelah pembayaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|integer',
            'transaction_id' => 'required|string',
            'order_id' => 'required|string',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
            'fraud_status' => 'nullable|string',
            'gross_amount' => 'required|numeric',
        ]);

        $payment = Payment::create([
            'booking_id' => $request->booking_id,
            'transaction_id' => $request->transaction_id,
            'order_id' => $request->order_id,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'fraud_status' => $request->fraud_status,
            'gross_amount' => $request->gross_amount,
            'paid_at' => now(),
        ]);

        return response()->json(['message' => 'Payment recorded.', 'data' => $payment]);
    }

    public function midtransCallback(Request $request)
    {
        $notification = new \Midtrans\Notification();   
        $order_id      = $notification->order_id;
        $status        = $notification->transaction_status;
        $fraud_status  = $notification->fraud_status;
        $gross_amount  = $notification->gross_amount;

        // Validasi signature
        $signature = $request->signature_key;
        $expectedSignature = hash(
            "sha512",
            $order_id . $notification->status_code . $gross_amount . config('midtrans.server_key')
        );

        if ($signature !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $payment = Payment::where('order_id', $order_id)->firstOrFail();

        $payment->update([
            'payment_status' => $status,
            'fraud_status'   => $fraud_status,
            'paid_at'        => now(),
        ]);

        // Map status Midtrans ke status booking
        $newBookingStatus = 'pending';
        if ($status === 'settlement' || $status === 'capture') {
            $newBookingStatus = 'confirmed';
        } elseif (in_array($status, ['deny', 'expire', 'cancel'])) {
            $newBookingStatus = 'cancelled';
        }

        $payment->booking->update(['status' => $newBookingStatus]);

        return response()->json(['message' => 'OK'], 200);
    }
}
