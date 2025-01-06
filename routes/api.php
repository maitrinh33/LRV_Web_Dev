<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AdminBookingController;


Route::middleware('auth:sanctum')->group(function () {
    // API routes for appointments
    Route::resource('appointments', AppointmentController::class)->except(['create', 'edit']);
    Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])
        ->name('api.appointments.cancel');


        Route::get('/admin/bookings', [AdminBookingController::class, 'index']);
        Route::patch('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve']);
        Route::patch('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject']);
});

// Debug user info (optional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

