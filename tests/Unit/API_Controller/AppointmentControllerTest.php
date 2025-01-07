<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class AppointmentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user
        $this->user = User::factory()->create();
        Auth::login($this->user); // Log in the user
    }

    /** @test */
    public function it_can_fetch_appointments()
    {
        // Create some test appointments
        Booking::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->getJson('/api/appointments');

        $response->assertStatus(200)
                 ->assertJsonStructure(['data' => [
                     '*' => ['id', 'date', 'time', 'service_id', 'status']
                 ]]);
    }

    /** @test */
    public function it_can_store_an_appointment()
    {
        $data = [
            'date' => now()->addDays(1)->toDateString(),
            'time' => '10:00',
            'service_id' => 1, // Assuming a service with ID 1 exists
        ];

        $response = $this->postJson('/api/appointments', $data);

        $response->assertStatus(201)
                 ->assertJson(['date' => $data['date'], 'time' => $data['time']]);
        
        $this->assertDatabaseHas('bookings', $data);
    }

    /** @test */
    public function it_validates_appointment_store_request()
    {
        $response = $this->postJson('/api/appointments', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['date', 'time', 'service_id']);
    }

    /** @test */
    public function it_can_show_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->getJson('/api/appointments/' . $appointment->id);

        $response->assertStatus(200)
                 ->assertJson(['id' => $appointment->id]);
    }

    /** @test */
    public function it_can_update_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $data = [
            'date' => now()->addDays(2)->toDateString(),
            'time' => '12:00'
        ];

        $response = $this->putJson('/api/appointments/' . $appointment->id, $data);

        $response->assertStatus(200)
                 ->assertJson(['date' => $data['date'], 'time' => $data['time']]);

        $this->assertDatabaseHas('bookings', $data);
    }

    /** @test */
    public function it_can_cancel_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->putJson('/api/appointments/' . $appointment->id, ['cancel' => true]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Appointment cancelled successfully.']);

        $this->assertDatabaseHas('bookings', [
            'id' => $appointment->id,
            'status' => 'cancelled'
        ]);
    }

    /** @test */
    public function it_can_delete_an_appointment()
    {
        $appointment = Booking::factory()->create(['user_id' => $this->user->id]);

        $response = $this->deleteJson('/api/appointments/' . $appointment->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Appointment deleted successfully.']);

        $this->assertDeleted($appointment);
    }
}