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

    Route::resource('admin/bookings', AdminBookingController::class)->only(['index', 'show']);
    // Custom routes for approving and rejecting
    Route::patch('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::patch('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
    
    Route::get('/admin/bookings', [AdminBookingController::class, 'webIndex'])->name('admin.bookings.index');
        

});

// Debug user info (optional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

