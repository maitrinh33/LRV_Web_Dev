<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'title' => 'Party Makeup Service',
            'description' => 'Tailored party makeup to create any look',
            'image' => 'src/image/service/professional-makeup-service.jpg',
            'category' => 'party',
        ]);

        Service::create([
            'title' => 'Bridal Makeup Service',
            'description' => 'Glow with breathtaking bridal looks for the big day',
            'image' => 'src/image/service/bridal_makeup_service.jpg',
            'category' => 'bridal',
        ]);

        Service::create([
            'title' => 'Ceremony Makeup Service',
            'description' => 'Highlighting grace, poise, and refinement beauty',
            'image' => 'src/image/service/personal_makeup_service.jpg',
            'category' => 'ceremony',
        ]);
    }
}
