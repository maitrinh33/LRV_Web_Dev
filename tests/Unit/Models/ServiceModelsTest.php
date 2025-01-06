<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_service_successfully()
    {
        // Act: Tạo một bản ghi Service
        $service = Service::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High-quality web development services.',
            'image_path' => '/images/web-development.jpg',
            'offered_services' => 'Frontend, Backend, Fullstack',
        ]);

        // Assert: Kiểm tra bản ghi đã được lưu trong cơ sở dữ liệu
        $this->assertDatabaseHas('services', [
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High-quality web development services.',
            'image_path' => '/images/web-development.jpg',
            'offered_services' => 'Frontend, Backend, Fullstack',
        ]);
    }

    /** @test */
    public function it_requires_fillable_fields()
    {
        // Arrange: Tạo dữ liệu không hợp lệ
        $this->expectException(\Illuminate\Database\Eloquent\MassAssignmentException::class);

        // Act: Cố gắng tạo một bản ghi không có các trường fillable
        Service::create([
            'non_fillable_field' => 'This should fail',
        ]);
    }

    /** @test */
    public function it_updates_a_service_successfully()
    {
        // Arrange: Tạo một bản ghi Service
        $service = Service::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'High-quality web development services.',
            'image_path' => '/images/web-development.jpg',
            'offered_services' => 'Frontend, Backend, Fullstack',
        ]);

        // Act: Cập nhật bản ghi Service
        $service->update([
            'name' => 'Mobile Development',
            'slug' => 'mobile-development',
            'description' => 'High-quality mobile development services.',
        ]);

        // Assert: Kiểm tra dữ liệu đã được cập nhật
        $this->assertDatabaseHas('services', [
            'name' => 'Mobile Development',
            'slug' => 'mobile-development',
            'description' => 'High-quality mobile development services.',
        ]);
    }
}
