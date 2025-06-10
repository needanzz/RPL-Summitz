<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with(['mountain', 'itineraries', 'facilities'])->get();
        return response()->json(['data' => $trips]);
        // return response (['data' => $trips ]);
    }


    public function show($id)
    {
        $trip = Trip::with(['mountain', 'itineraries', 'facilities'])->findOrFail($id);
        return response()->json([
            'id' => $trip->id,
            'mountain' => $trip->mountain,
            'itineraries' => $trip->itineraries,
            'facilities' => $trip->facilities,
        ]);
    }

    public function getMountain($id)
    {
        $trip = Trip::with('mountain')->findOrFail($id);
        return response()->json($trip->mountain);
    }

    public function getItineraries($id)
    {
        $trip = Trip::with('itineraries')->findOrFail($id);
        return response()->json(['data' => $trip->itineraries]);
    }

    public function getFacilities($id)
    {
        $trip = Trip::with('facilities')->findOrFail($id);
        return response()->json(['data' => $trip->facilities]);
    }
}