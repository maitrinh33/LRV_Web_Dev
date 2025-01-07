<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserModelsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a user can be created with valid data.
     *
     * @return void
     */
    public function test_user_creation()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password', // Ensure it's hashed in the model
            'phone' => '1234567890',
            'address' => '123 Street, City',
            'usertype' => 'customer',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
        ]);

        // Check if password is hashed
        $this->assertTrue(Hash::check('password', $user->password));
    }

    /**
     * Test that the password is cast to a hashed value.
     *
     * @return void
     */
    public function test_password_is_hashed()
    {
        $user = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => 'password',
            'phone' => '0987654321',
            'address' => '456 Avenue, City',
            'usertype' => 'admin',
        ]);

        // Check that the password is stored as a hashed value
        $this->assertNotEquals('password', $user->password);
        $this->assertTrue(Hash::check('password', $user->password));
    }


    /**
     * Test that the profile photo URL is appended correctly.
     *
     * @return void
     */
    public function test_profile_photo_url_is_appended()
    {
        $user = User::create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => 'password',
            'phone' => '5566778899',
            'address' => '1011 Parkway, City',
            'usertype' => 'customer',
        ]);

        $this->assertArrayHasKey('profile_photo_url', $user->toArray());
    }

    /**
     * Test that sensitive attributes are hidden when the model is serialized.
     *
     * @return void
     */
    public function test_hidden_attributes()
    {
        $user = User::create([
            'name' => 'Charlie',
            'email' => 'charlie@example.com',
            'password' => 'password',
            'phone' => '2233445566',
            'address' => '2021 Main St, City',
            'usertype' => 'customer',
        ]);

        $userArray = $user->toArray();

        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
    }
}

