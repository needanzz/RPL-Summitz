<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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
        $request->validate([
            'gross_amount' => 'required|numeric',
            'cust_name' => 'required|string',
            'email' => 'required|email',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => uniqid('ORDER-'),
                'gross_amount' => $request->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $request->cust_name,
                'email' => $request->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $params['transaction_details']['order_id']
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
}
