<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;


// Use the CourseController for the home route
Route::get('/', [CourseController::class, 'index'])->name('home');

// Use the same controller for /courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


