<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_displays_the_admin_dashboard_page()
    {
        // Act: Send a GET request to the dashboard route
        $response = $this->get(route('admin.index'));

        // Assert: Ensure the correct view is returned
        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }
}
