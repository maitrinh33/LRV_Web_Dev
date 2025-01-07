<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the ProfileController::show() method returns the correct view.
     *
     * @return void
     */
    public function testShowReturnsCorrectView()
    {
        // Act: Send a GET request to the route associated with the ProfileController@show.
        $response = $this->get(route('profile.show'));

        // Assert: Check if the correct view is returned.
        $response->assertStatus(200);
        $response->assertViewIs('profile.show');
    }
}
