<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ScheduleController;
// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sinilah kamu bisa mendaftarkan rute API untuk aplikasimu. 
| Rute-rute ini akan dikelompokkan dalam grup middleware "api".
|
*/
// Route::get('/user', function (Request $request) {
// //     return 'Hello';
// // });

Route::middleware('api')->get('/ping', function () {
    return response()->json(['message' => 'API is working']);
});

Route::apiResource('provinces', ProvinceController::class);
Route::apiResource('mountains', MountainController::class);
Route::apiResource('trips', TripController::class);
Route::apiResource('itineraries', ItineraryController::class);
Route::apiResource('facilities', FacilityController::class);
Route::apiResource('galleries', GalleryController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('users', UserController::class);
// Route::apiResource('customers', CustomerController::class);
Route::middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('bookings', BookingController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::post('/payments/token', [PaymentController::class, 'createTransaction']);
    Route::post('/payments/store', [PaymentController::class, 'store']);
});

Route::post('/login', [AuthController::class, 'login']);
// Route::middleware('web')->post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






// Route::get('/trip', [TripController::class, 'index']);