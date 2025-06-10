<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Menampilkan semua review
    public function index()
    {
        $reviews = Review::with(['customer', 'schedule.trip'])->get();
        return response()->json(['data' => $reviews]);
    }

    // Menyimpan review baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'schedule_id' => 'required|exists:schedules,id',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($validated);
        return response()->json(['data' => $review], 201);
    }

    // Menampilkan satu review
    public function show($id)
    {
        $review = Review::with(['customer', 'schedule.trip'])->findOrFail($id);
        return response()->json(['data' => $review]);
    }

    // Update review
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'rating' => 'nullable|numeric|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validated);
        return response()->json(['data' => $review]);
    }

    // Hapus review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
