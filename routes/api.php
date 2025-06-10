<?php

use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return 'Hello';
// });

// Route::get('/trip', [TripController::class, 'index']);

Route::middleware('api')->group(function () {
    // Daftar semua trip
    Route::get('/trip', [TripController::class, 'index']);

    // Detail trip beserta data terkait
    Route::get('/trips/{id}', [TripController::class, 'show']);

    // Endpoint terpisah (opsional)
    // Route::get('/trips/{id}/mountain', [TripController::class, 'getMountain']);
    // Route::get('/trips/{id}/itineraries', [TripController::class, 'getItineraries']);
    // Route::get('/trips/{id}/facilities', [TripController::class, 'getFacilities']);
});