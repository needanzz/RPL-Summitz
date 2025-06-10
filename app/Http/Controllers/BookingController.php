<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Ambil semua data booking
    public function index()
    {
        return response()->json([
            'data' => Booking::with(['customer', 'schedule'])->get()
        ]);
    }

    // Simpan booking baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'schedule_id' => 'required|exists:schedules,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $booking = Booking::create($validated);

        return response()->json([
            'message' => 'Booking created successfully',
            'data' => $booking
        ], 201);
    }

    // Ambil detail booking
    public function show($id)
    {
        $booking = Booking::with(['customer', 'schedule'])->findOrFail($id);
        return response()->json(['data' => $booking]);
    }

    // Update booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|exists:customers,id',
            'schedule_id' => 'sometimes|exists:schedules,id',
            'total_price' => 'sometimes|numeric',
            'status' => 'sometimes|string',
        ]);

        $booking->update($validated);

        return response()->json([
            'message' => 'Booking updated',
            'data' => $booking
        ]);
    }

    // Hapus booking
    public function destroy($id)
    {
        Booking::destroy($id);
        return response()->json(['message' => 'Booking deleted']);
    }
}
