<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AdminBookingController;

// Protected by auth middleware
Route::middleware(['auth:sanctum'])->group(function () {
    // Resource routes for appointments
    Route::apiResource('appointments', AppointmentController::class);

    // Custom routes for approving and rejecting admin bookings
    Route::resource('admin/bookings', AdminBookingController::class)->only(['index', 'show']);
    Route::patch('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::patch('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
    Route::get('/admin/bookings', [AdminBookingController::class, 'webIndex'])->name('admin.bookings.index');
    Route::get('/appointments/search', [AppointmentController::class, 'search']);
});
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

// Debug user info (optional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});