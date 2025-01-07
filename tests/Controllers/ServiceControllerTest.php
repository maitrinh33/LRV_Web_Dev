<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Service;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_all_services_when_no_search_query_is_provided()
    {
        // Arrange: Create some services in the database
        $services = Service::factory()->count(5)->create();

        // Act: Send a GET request to the index route
        $response = $this->get(route('services.index'));

        // Assert: Check that the response contains all the services
        $response->assertStatus(200);
        foreach ($services as $service) {
            $response->assertSee($service->name);
        }
    }

    /** @test */
    public function it_filters_services_based_on_the_search_query()
    {
        // Arrange: Create services with specific names/descriptions
        $matchingService = Service::factory()->create([
            'name' => 'Test Service',
            'description' => 'This is a test description.',
        ]);

        $nonMatchingService = Service::factory()->create([
            'name' => 'Other Service',
            'description' => 'No match here.',
        ]);

        // Act: Send a GET request with a search query
        $response = $this->get(route('services.index', ['search' => 'Test']));

        // Assert: Check that only the matching service is visible in the response
        $response->assertStatus(200);
        $response->assertSee($matchingService->name);
        $response->assertDontSee($nonMatchingService->name);
    }

    /** @test */
    public function it_displays_the_correct_view_with_services()
    {
        // Arrange: Create some services
        Service::factory()->count(3)->create();

        // Act: Send a GET request to the index route
        $response = $this->get(route('services.index'));

        // Assert: Check that the correct view is returned with the services
        $response->assertStatus(200);
        $response->assertViewIs('service');
        $response->assertViewHas('services');
    }
}
