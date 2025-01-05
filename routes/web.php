<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;

// Use the CourseController for the home route
Route::get('/', [HomeController::class, 'index'])->name('homes.index');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');

Route::get('/add_booking', [AdminController::class, 'index'])->name('add_booking');


// Store the booking
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
// Optional: Other API routes can be added similarly
Route::get('/bookings', [BookingController::class, 'index'])->name('api.bookings.index');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('api.bookings.show');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('api.bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('api.bookings.destroy');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');




