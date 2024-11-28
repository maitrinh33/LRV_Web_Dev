<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using firstOrCreate to ensure no duplicates and create new records if they don't exist
        Course::firstOrCreate(
            ['name' => 'Personal Makeup'], // Unique check on the course name
            [
                'description' => 'Learn the basics of makeup.',
                'image_url' => 'course1.jpg',
                'price' => 99.99,
                'original_price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Course::firstOrCreate(
            ['name' => 'Bridal Makeup'],
            [
                'description' => 'Master layouts and concept for bridals in any event.',
                'image_url' => 'course2.jpg',
                'price' => 89.99,
                'original_price' => 129.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Course::firstOrCreate(
            ['name' => 'Professional Makeup'],
            [
                'description' => 'Dive deeper in color theories and visualization.',
                'image_url' => 'course3.jpg',
                'price' => 119.99,
                'original_price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
