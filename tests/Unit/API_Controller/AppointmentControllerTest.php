<?php

namespace Tests\Unit\API_Controller;

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
        $this->user = User::factory()->create(); // Tạo một user
        $this->token = $this->user->createToken('Test Token')->plainTextToken; // Tạo token
    }

    /** @test */
    public function it_can_fetch_appointments()
    {
        Booking::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
                         ->getJson('/api/appointments');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data'); // Đảm bảo cấu trúc JSON có key 'data'
    }

    /** @test */
    public function it_returns_unauthorized_error_if_not_authenticated()
    {
        // Gửi request mà không có token
        $response = $this->getJson('/api/appointments');

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Unauthenticated.']);
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
