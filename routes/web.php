<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    CourseController,
    ServiceController,
    IntroController,
    DashboardController,
    BookingController,
    ProfileController,
    UserController,
};
use App\Http\Controllers\Web\AppointmentWebController;
use App\Mail\BookingConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use Illuminate\Support\Facades\Broadcast;

// Broadcasting Authentication
Broadcast::routes(['middleware' => ['web', 'auth']]);

Route::get('/sentry-test', function () {
    throw new Exception('This is a test exception for Sentry!');
});
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

// Public routes (no authentication required)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/intros', [IntroController::class, 'index'])->name('intros.index');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services/search', [ServiceController::class, 'search'])->name('services.search');

Route::get('/send-test-email', function () {
    $booking = Booking::first(); 
    if ($booking) {
        Mail::to('test@example.com')->send(new BookingConfirmationMail($booking));
        return 'Test email has been sent!';
    } else {
        return 'No booking found!';
    }
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // User profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    
    // Booking routes
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::resource('bookings', BookingController::class);
    
    // Appointment routes
    Route::get('appointments', [AppointmentWebController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{id}/edit', [AppointmentWebController::class, 'edit'])->name('appointments.edit');
    Route::post('appointments/{id}/cancel', [AppointmentWebController::class, 'cancel'])->name('appointments.cancel');

    // Chat routes
    Route::get('chats', [UserController::class, 'index'])->name('chats.index');

    Route::get('chats/{id}', [UserController::class, 'view'])->name('chats.view');
});