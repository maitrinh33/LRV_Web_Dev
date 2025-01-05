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
            'image_path' => 'images/service/bridal1.jpg',
            'offered_services' => json_encode([
                'BRIDAL MAKEUP',
                'HAIR STYLING',
                'SKIN PREPARATION',
                'TRIAL SESSION',
            ]),
        ]);

                // New services added
            Service::create([
                'name' => 'Personal Makeup Service',
                'slug' => 'personal-makeup',
                'description' => 'Personalized makeup services tailored for individual needs and preferences.',
                'image_path' => 'images/service/personal.jpg',
                'offered_services' => json_encode([
                    'PERSONAL CONSULTATION',
                    'CUSTOM MAKEUP APPLICATION',
                    'SKIN CARE ADVICE',
                    'MAKEUP REMOVAL',
            ]),
        ]);
        
            Service::create([
                'name' => 'Special Occasion Makeup Service',
                'slug' => 'special-occasion-makeup',
                'description' => 'Makeup services designed for special occasions like birthdays, anniversaries, and more.',
                'image_path' => 'images/service/special-occasion.jpg',
                'offered_services' => json_encode([
                    'OCCASION MAKEUP',
                    'MAKEUP TOUCH-UPS',
                    'EVENING GLAM',
                    'MAKEUP FOR PHOTOSHOOTS',
                ]),
            ]);

            Service::create([
                'name' => 'Fashion Makeup Service',
                'slug' => 'fashion-makeup',
                'description' => 'Trendy makeup services tailored for photoshoots, runway shows, and fashion events.',
                'image_path' => 'images/service/fashion.jpg',
                'offered_services' => json_encode([
                    'EDITORIAL MAKEUP',
                    'RUNWAY MAKEUP',
                    'THEMED MAKEUP',
                    'MAKEUP FOR FASHION SHOWS',
                ]),
            ]);

    }
}
