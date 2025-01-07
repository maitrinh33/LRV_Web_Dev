<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the store method with valid input and authenticated user.
     */
    public function testStoreWithAuthenticatedUser()
    {
        // Create a mock authenticated user
        $user = User::factory()->create();
    $booking = Booking::factory()->create();

        // Mock input data
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'date' => '2025-01-01',
            'time' => '14:00',
            'service' => 'General Consultation',
            'message' => 'Need assistance with X.',
        ];

        // Call the store method
        $response = $this->post(route('bookings.store'), $data);

        // Assert the booking is saved in the database
        $this->assertDatabaseHas('bookings', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        // Assert redirection and success message
        $response->assertRedirect();
        $response->assertSessionHas('message', 'Appointment Request Successful. We will contact you soon!');
    }

    /**
     * Test the store method with valid input and guest user.
     */
    public function testStoreWithGuestUser()
    {
        // Mock input data
        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
            'date' => '2025-01-02',
            'time' => '15:00',
            'service' => 'Dental Checkup',
            'message' => 'Looking for a routine checkup.',
        ];

        // Call the store method
        $response = $this->post(route('bookings.store'), $data);

        // Assert the booking is saved in the database
        $this->assertDatabaseHas('bookings', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'guest_id' => Booking::where('email', 'jane@example.com')->first()->guest_id,
            'status' => 'pending',
        ]);

        // Assert redirection and success message
        $response->assertRedirect();
        $response->assertSessionHas('message', 'Appointment Request Successful. We will contact you soon!');
    }

    /**
     * Test the store method with invalid input.
     */
    public function testStoreWithInvalidInput()
    {
        // Mock input data
        $data = [
            'name' => '', // Invalid name
            'email' => 'invalid-email', // Invalid email
            'phone' => '', // Missing phone
            'date' => 'invalid-date', // Invalid date
            'time' => '25:00', // Invalid time
            'service' => '', // Missing service
            'message' => null,
        ];

        // Call the store method
        $response = $this->post(route('bookings.store'), $data);

        // Assert validation errors
        $response->assertSessionHasErrors(['name', 'email', 'phone', 'date', 'time', 'service']);

        // Assert no booking is saved in the database
        $this->assertDatabaseMissing('bookings', [
            'email' => 'invalid-email',
        ]);
    }

    /**
     * Test the store method with error during booking creation.
     */
    public function testStoreWithErrorHandling()
    {
        // Mock authenticated user
        $user = User::factory()->create();

        // Mock input data
        $data = [
            'name' => 'Error Test',
            'email' => 'error@example.com',
            'phone' => '1122334455',
            'date' => '2025-01-03',
            'time' => '16:00',
            'service' => 'X-Ray',
            'message' => 'Test case for error handling.',
        ];

        // Mock a failure in the Booking model save method
        Booking::shouldReceive('save')->andThrow(new \Exception('Database error'));

        // Call the store method
        $response = $this->post(route('bookings.store'), $data);

        // Assert error message
        $response->assertSessionHas('message', 'Booking failed. Please check your details and try again.');
    }
}
