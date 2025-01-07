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
    ProfileController,

};
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AdminBookingController;
use App\Http\Controllers\Web\AppointmentWebController;
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
// Public routes (no authentication required)
Route::get('/', [HomeController::class, 'index'])->name('homes.index');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::resource('bookings', BookingController::class);
// Authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('appointments/show', [AdminController::class, 'show'])->name('admin.show');
    Route::patch('/bookings/{id}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::patch('/admin/{id}/reject', [BookingController::class, 'reject'])->name('admin.bookings.reject');

    // Appointment web routes
    Route::get('appointments', [AppointmentWebController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{id}/edit', [AppointmentWebController::class, 'edit'])->name('appointments.edit');
    Route::post('appointments/{id}/cancel', [AppointmentWebController::class, 'cancel'])->name('appointments.cancel');

    // Additional admin routes
    Route::get('/admin/add-booking', [AdminController::class, 'addBooking']);
    Route::get('/admin/appointments', [AdminController::class, 'showAppointments']);
});

// User profile route
Route::middleware(['auth'])->get('/user/profile', [ProfileController::class, 'show'])->name('profile.show');