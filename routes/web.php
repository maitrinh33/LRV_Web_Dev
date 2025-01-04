<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

// Use the CourseController for the home route
Route::get('/', [HomeController::class, 'index'])->name('homes.index');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');

Route::get('/add_booking', [AdminController::class, 'index'])->name('add_booking');


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




