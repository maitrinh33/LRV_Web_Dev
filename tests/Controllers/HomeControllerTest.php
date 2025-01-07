<?php

namespace Tests\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_home_for_guest_users()
    {
        // Ensure no user is authenticated
        Auth::shouldReceive('id')->andReturn(null);

        // Call the controller action
        $response = $this->get('/');

        // Assert the response redirects to 'home' view
        $response->assertViewIs('home');
    }

    /** @test */
    public function it_redirects_authenticated_user_to_home()
    {
        // Create a user with 'user' type
        $user = User::factory()->create([
            'usertype' => 'user',
        ]);


        // Call the controller action
        $response = $this->get('/');

        // Assert the response renders 'home' view
        $response->assertViewIs('home');
    }

    /** @test */
    public function it_redirects_authenticated_admin_to_admin_index()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'usertype' => 'admin',
        ]);

        // Call the controller action
        $response = $this->get('/');

        // Assert the response renders 'admin.index' view
        $response->assertViewIs('admin.index');
    }

    /** @test */
    public function it_redirects_authenticated_user_with_unknown_usertype_to_home()
    {
        // Create a user with an unknown type
        $user = User::factory()->create([
            'usertype' => 'unknown',
        ]);

        // Call the controller action
        $response = $this->get('/');

        // Assert the response renders 'home' view
        $response->assertViewIs('home');
    }
}
