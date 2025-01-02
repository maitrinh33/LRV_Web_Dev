<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\ServiceController;

// Use the CourseController for the home route
Route::get('/', [HomeController::class, 'index'])->name('home');
// Use the same controller for /courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/home', [ServiceController::class, 'index'])->name('homes.index');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');



