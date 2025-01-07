<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_service()
    {
        $serviceData = [
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High quality web development services.',
            'image_path' => 'images/web-development.jpg',
            'offered_services' => json_encode(['Frontend', 'Backend']),
        ];

        $service = Service::create($serviceData);

        $this->assertDatabaseHas('services', $serviceData);
        $this->assertEquals('Web Development', $service->name);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Service::create([]);
    }

    /** @test */
    public function it_has_a_slug_that_is_unique()
    {
        Service::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High quality web development services.',
            'image_path' => 'images/web-development.jpg',
            'offered_services' => json_encode(['Frontend', 'Backend']),
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Service::create([
            'name' => 'SEO Services',
            'slug' => 'web-development', // Duplicate slug
            'description' => 'SEO Services.',
            'image_path' => 'images/seo-services.jpg',
            'offered_services' => json_encode(['On-page', 'Off-page']),
        ]);
    }

    /** @test */
    public function it_can_convert_offered_services_to_array()
    {
        $service = Service::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High quality web development services.',
            'image_path' => 'images/web-development.jpg',
            'offered_services' => json_encode(['Frontend', 'Backend']),
        ]);

        $this->assertIsArray($service->offered_services);
        $this->assertContains('Frontend', $service->offered_services);
    }
}