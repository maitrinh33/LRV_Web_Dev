<?php

namespace Tests\Controllers;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the index method returns a view with no courses.
     */
    public function test_index_method_returns_empty_courses()
    {
        // Make a GET request to the index method
        $response = $this->get(route('courses.index'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the view contains no courses
        $response->assertViewHas('courses', function ($courses) {
            return $courses->isEmpty();
        });
    }

    /**
     * Test if the index method returns a view with courses.
     */
    public function test_index_method_returns_courses()
    {
        // Create some dummy courses
        Course::factory()->count(3)->create();

        // Make a GET request to the index method
        $response = $this->get(route('courses.index'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the view contains the courses
        $response->assertViewHas('courses', function ($courses) {
            return $courses->count() === 3;
        });
    }

    /**
     * Test if the index method applies search filter.
     */
    public function test_index_method_applies_search_filter()
    {
        // Create courses
        Course::factory()->create(['name' => 'Laravel Basics']);
        Course::factory()->create(['name' => 'VueJS Advanced']);
        Course::factory()->create(['name' => 'React for Beginners']);

        // Make a GET request with search parameter
        $response = $this->get(route('courses.index', ['search' => 'Laravel']));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the view contains only the matching course
        $response->assertViewHas('courses', function ($courses) {
            return $courses->count() === 1 && $courses->first()->name === 'Laravel Basics';
        });
    }

    /**
     * Test if the index method handles missing search parameter gracefully.
     */
    public function test_index_method_with_missing_search_filter()
    {
        // Create courses
        Course::factory()->count(5)->create();

        // Make a GET request without search parameter
        $response = $this->get(route('courses.index'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that all courses are returned
        $response->assertViewHas('courses', function ($courses) {
            return $courses->count() === 5;
        });
    }
}
