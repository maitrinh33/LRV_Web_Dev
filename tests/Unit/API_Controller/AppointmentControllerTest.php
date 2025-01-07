<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(); // Create a user for testing
        $this->token = $this->user->createToken('Test Token')->plainTextToken; // Create a token
    }

    /** @test */
    public function it_can_fetch_appointments()
    {
        Booking::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->getJson('/api/appointments');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data'); // Ensure JSON structure has 'data' key
    }

/** @test */
public function it_returns_unauthorized_error_if_not_authenticated()
{
    // Make a request without authentication
    $response = $this->getJson('/api/appointments');

    // Expect a JSON response with the correct unauthorized message
    $response->assertStatus(401)
             ->assertJson(['message' => 'Unauthenticated.']);
}

/** @test */
/** @test */
public function it_can_store_a_booking()
{
    // Arrange: Create a user
    $user = User::factory()->create();

    // Manually create a token for the user
    $token = $user->createToken('TestToken')->plainTextToken;

    // Prepare booking data
    $data = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '1234567890',
        'date' => now()->addDays(2)->toDateString(),
        'time' => '14:00',
        'message' => 'Looking forward to my appointment.',
    ];

    // Act: Make the POST request to store the booking with the token in the header
    $response = $this->postJson('/api/appointments', $data, [
        'Authorization' => 'Bearer ' . $token,
    ]);

    // Assert: Check the response status and structure
    $response->assertStatus(201)
             ->assertJsonStructure(['id', 'user_id', 'name', 'email', 'phone', 'date', 'time', 'status'])
             ->assertJson(['name' => 'John Doe', 'email' => 'johndoe@example.com']);

    // Assert the booking exists in the database
    $this->assertDatabaseHas('bookings', [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '1234567890',
        'date' => now()->addDays(2)->toDateString(),
        'time' => '14:00',
        'message' => 'Looking forward to my appointment.',
        'user_id' => $user->id,
    ]);
}

    /** @test */
    public function it_shows_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->getJson("/api/appointments/{$appointment->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $appointment->id]);
    }

    /** @test */
    public function it_can_update_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $data = [
            'date' => now()->addDays(3)->toDateString(),
            'time' => '15:00',
        ];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->putJson("/api/appointments/{$appointment->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('bookings', $data + ['id' => $appointment->id]);
    }

    /** @test */
    public function it_can_cancel_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->putJson("/api/appointments/{$appointment->id}", ['cancel' => true]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Appointment cancelled successfully.']);
        $this->assertDatabaseHas('bookings', [
            'id' => $appointment->id,
            'status' => 'cancelled',
        ]);
    }

    /** @test */
    public function it_can_delete_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->deleteJson("/api/appointments/{$appointment->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Appointment deleted successfully.']);
    }

    /** @test */
    public function it_fails_to_show_an_unauthorized_appointment()
    {
        $anotherUser = User::factory()->create();
        $appointment = Booking::factory()->create(['user_id' => $anotherUser->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->getJson("/api/appointments/{$appointment->id}");

        $response->assertStatus(403)
                 ->assertJson(['error' => 'Unauthorized']);
    }
}