<?php

namespace Tests\Feature;

use App\Jobs\SendBookingStatusEmail;
use App\Mail\BookingStatusMail;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class BookingEmailTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
        Queue::fake();
        Log::spy();
    }

    /** @test */
    public function it_sends_approval_email_when_booking_is_approved()
    {
        // Create a user and service
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Create a booking
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'service' => $service->name,
            'status' => 'pending'
        ]);

        // Create and authenticate an admin user
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        // Approve the booking
        $response = $this->patchJson("/api/admin/bookings/{$booking->id}/approve");

        // Assert the response
        $response->assertStatus(200)
                ->assertJson(['message' => 'Booking approved successfully.']);

        // Assert the job was dispatched
        Queue::assertPushed(SendBookingStatusEmail::class, function ($job) use ($booking) {
            return $job->booking->id === $booking->id;
        });

        // Process the job
        $job = new SendBookingStatusEmail($booking, 'approved');
        $job->handle();

        // Assert the email was sent
        Mail::assertSent(BookingStatusMail::class, function ($mail) use ($booking) {
            return $mail->hasTo($booking->email) &&
                   $mail->booking->id === $booking->id &&
                   $mail->status === 'approved';
        });
    }

    /** @test */
    public function it_sends_rejection_email_when_booking_is_rejected()
    {
        // Create a user and service
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Create a booking
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'service' => $service->name,
            'status' => 'pending'
        ]);

        // Create and authenticate an admin user
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        // Reject the booking
        $response = $this->patchJson("/api/admin/bookings/{$booking->id}/reject", [
            'cancellation_reason' => 'Test rejection reason'
        ]);

        // Assert the response
        $response->assertStatus(200)
                ->assertJson(['message' => 'Booking rejected successfully.']);

        // Assert the job was dispatched
        Queue::assertPushed(SendBookingStatusEmail::class, function ($job) use ($booking) {
            return $job->booking->id === $booking->id;
        });

        // Process the job
        $job = new SendBookingStatusEmail($booking, 'rejected');
        $job->handle();

        // Assert the email was sent
        Mail::assertSent(BookingStatusMail::class, function ($mail) use ($booking) {
            return $mail->hasTo($booking->email) &&
                   $mail->booking->id === $booking->id &&
                   $mail->status === 'rejected';
        });
    }

    /** @test */
    public function it_handles_email_sending_failure()
    {
        // Create a user and service
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Create a booking
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'service' => $service->name,
            'status' => 'pending'
        ]);

        // Create and authenticate an admin user
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        // Mock Mail facade to throw an exception
        Mail::fake();
        Mail::shouldReceive('to')
            ->andThrow(new \Exception('Failed to send email'));

        // Approve the booking
        $response = $this->patchJson("/api/admin/bookings/{$booking->id}/approve");

        // Assert the response
        $response->assertStatus(200)
                ->assertJson(['message' => 'Booking approved successfully.']);

        // Assert the job was dispatched
        Queue::assertPushed(SendBookingStatusEmail::class, function ($job) use ($booking) {
            return $job->booking->id === $booking->id;
        });

        // Process the job
        $job = new SendBookingStatusEmail($booking, 'approved');
        try {
            $job->handle();
        } catch (\Exception $e) {
            // Expected exception
        }

        // Assert the error was logged
        Log::shouldHaveReceived('error')
            ->with('Failed to send booking status email: Failed to send email');
    }

    /** @test */
    public function email_contains_correct_booking_details()
    {
        // Create a user and service
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Create a booking
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'service' => $service->name,
            'status' => 'pending'
        ]);

        // Create and authenticate an admin user
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        // Approve the booking
        $response = $this->patchJson("/api/admin/bookings/{$booking->id}/approve");

        // Assert the response
        $response->assertStatus(200)
                ->assertJson(['message' => 'Booking approved successfully.']);

        // Assert the job was dispatched
        Queue::assertPushed(SendBookingStatusEmail::class, function ($job) use ($booking) {
            return $job->booking->id === $booking->id;
        });

        // Process the job
        $job = new SendBookingStatusEmail($booking, 'approved');
        $job->handle();

        // Assert the email was sent with correct details
        Mail::assertSent(BookingStatusMail::class, function ($mail) use ($booking) {
            return $mail->hasTo($booking->email) &&
                   $mail->booking->id === $booking->id &&
                   $mail->booking->name === $booking->name &&
                   $mail->booking->service === $booking->service &&
                   $mail->booking->date === $booking->date &&
                   $mail->booking->time === $booking->time &&
                   $mail->status === 'approved';
        });
    }
}
