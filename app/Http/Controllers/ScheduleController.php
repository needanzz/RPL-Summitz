<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json([
            'status' => 'success',
            'data' => $schedules,
        ]);
    }

    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $schedule,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'departure_date' => 'required|date',
            'quota' => 'required|integer|min:1',
        ]);

        $schedule = Schedule::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $schedule,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $validated = $request->validate([
            'trip_id' => 'sometimes|exists:trips,id',
            'departure_date' => 'sometimes|date',
            'quota' => 'sometimes|integer|min:1',
        ]);

        $schedule->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $schedule,
        ]);
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule deleted successfully',
        ]);
    }
}
