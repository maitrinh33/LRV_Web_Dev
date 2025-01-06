<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_booking_successfully()
    {
        // Arrange: Create a user
        $user = User::factory()->create();

        // Act: Create a booking record
        $booking = Booking::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'date' => '2025-01-15',
            'time' => '14:00',
            'service' => 'Haircut',
            'message' => 'Please be on time',
            'status' => 'Pending',
            'user_id' => $user->id,
            'cancellation_reason' => null,
        ]);

        // Assert: Verify the record exists in the database
        $this->assertDatabaseHas('bookings', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'status' => 'Pending',
        ]);
    }

    /** @test */
    public function it_checks_user_relationship()
    {
        // Arrange: Create a user and a booking
        $user = User::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
        ]);

        // Assert: Verify the booking belongs to the user
        $this->assertTrue($booking->user->is($user));
    }

    /** @test */
    public function it_checks_display_status_attribute()
    {
        // Arrange: Create bookings with different statuses
        $bookingPending = Booking::factory()->make(['status' => 'pending']);
        $bookingCancelled = Booking::factory()->make(['status' => 'Cancelled on 2025-01-06 10:00:00']);

        // Assert: Verify the accessor behavior
        $this->assertEquals('Pending', $bookingPending->display_status);
        $this->assertEquals('Cancelled on 2025-01-06 10:00:00', $bookingCancelled->display_status);
    }
}
