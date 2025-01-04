<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Party Makeup Service',
            'slug' => 'party-makeup',
            'description' => 'Makeup service for parties and special events.',
            'image_path' => 'images/service/party1.jpg',
            'offered_services' => json_encode([
                'CUSTOM MAKEUP',
                'COUTURE HAIR STYLING',
                'SKIN TREATMENTS',
                'ACCESSORIES STYLING',
            ]),
        ]);

        Service::create([
            'name' => 'Bridal Makeup Service',
            'slug' => 'bridal-makeup',
            'description' => 'Exclusive bridal makeup for your big day.',
            'image_path' => 'images/service/bridal.jpg',
            'offered_services' => json_encode([
                'BRIDAL MAKEUP',
                'HAIR STYLING',
                'SKIN PREPARATION',
                'TRIAL SESSION',
            ]),
        ]);

        // Add more services as needed.
    }
}
