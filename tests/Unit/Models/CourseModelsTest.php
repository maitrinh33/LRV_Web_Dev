<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_course_successfully()
    {
        // Act: Tạo một bản ghi Course
        $course = Course::create([
            'name' => 'Introduction to Laravel',
            'description' => 'A beginner-friendly course on Laravel framework.',
            'image_url' => 'https://example.com/images/laravel-course.jpg',
            'price' => 99.99,
            'original_price' => 149.99,
        ]);

        // Assert: Kiểm tra bản ghi đã được lưu đúng cách
        $this->assertDatabaseHas('courses', [
            'name' => 'Introduction to Laravel',
            'description' => 'A beginner-friendly course on Laravel framework.',
            'image_url' => 'https://example.com/images/laravel-course.jpg',
            'price' => 99.99,
            'original_price' => 149.99,
        ]);
    }

    /** @test */
    public function it_requires_fillable_fields()
    {
        // Expecting an exception for mass assignment
        $this->expectException(\Illuminate\Database\Eloquent\MassAssignmentException::class);

        try {
            // Attempt to create a Course without any fillable fields
            Course::create([]);
        } catch (\Illuminate\Database\Eloquent\MassAssignmentException $e) {
            // Print the exception message for debugging
            echo 'Mass Assignment Exception Message: ' . $e->getMessage();
            throw $e; // Re-throw the exception to fail the test
        }
    }

    /** @test */
    public function it_updates_a_course_successfully()
    {
        // Arrange: Tạo một bản ghi Course
        $course = Course::create([
            'name' => 'Introduction to Laravel',
            'description' => 'A beginner-friendly course on Laravel framework.',
            'image_url' => 'https://example.com/images/laravel-course.jpg',
            'price' => 99.99,
            'original_price' => 149.99,
        ]);

        // Act: Cập nhật bản ghi Course
        $course->update([
            'name' => 'Advanced Laravel',
            'price' => 199.99,
        ]);

        // Assert: Kiểm tra bản ghi đã được cập nhật
        $this->assertDatabaseHas('courses', [
            'name' => 'Advanced Laravel',
            'price' => 199.99,
        ]);
    }
}
