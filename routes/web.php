<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    HomeController,
    CourseController,
    ServiceController,
    IntroController,
    DashboardController,
    BookingController,
    ProfileController
};
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AdminBookingController;


// Public routes (no authentication required)
Route::get('/', [HomeController::class, 'index'])->name('homes.index');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('bookings', BookingController::class);
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('appointments/show', [AdminController::class, 'show'])->name('admin.show'); 
    Route::patch('/bookings/{id}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::patch('/admin/{id}/reject', [BookingController::class, 'reject'])->name('admin.bookings.reject');

      
    // Web-only appointments routes
    Route::resource('appointments', AppointmentController::class)->only(['index', 'edit']);
});

// Protected by auth middleware
Route::middleware(['auth'])->patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])
     ->name('appointments.cancel');

// User profile route
Route::middleware(['auth'])->get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');







