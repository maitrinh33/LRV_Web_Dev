<?php

namespace Tests\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_credentials_returns_token_and_user()
    {
        // Arrange: Create a user in the database
        $password = 'password123';
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make($password),
        ]);

        // Act: Send a POST request to the login endpoint
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert: Check if the response is successful and contains the token and user
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'token',
            'user' => [
                'id', 'name', 'email', // Adjust these fields to match your User model
            ],
        ]);
    }

    public function test_login_with_invalid_email_returns_unauthorized()
    {
        // Arrange: Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Act: Send a POST request with an incorrect email
        $response = $this->postJson('/login', [
            'email' => 'wrong@example.com',
            'password' => 'password123',
        ]);

        // Assert: Check if the response returns an unauthorized error
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Invalid credentials']);
    }

    public function test_login_with_invalid_password_returns_unauthorized()
    {
        // Arrange: Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Act: Send a POST request with an incorrect password
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        // Assert: Check if the response returns an unauthorized error
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Invalid credentials']);
    }

    public function test_login_with_missing_fields_returns_validation_error()
    {
        // Act: Send a POST request with missing email and password
        $response = $this->postJson('/login', []);

        // Assert: Check if the response returns a validation error
        $response->assertStatus(422); // Unprocessable Entity for validation errors
        $response->assertJsonValidationErrors(['email', 'password']);
    }
}
