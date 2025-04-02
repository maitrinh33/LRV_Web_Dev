<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run AdminUserSeeder first to ensure admin exists
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Create test user if needed
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('user123user123'),
                'usertype' => 'user',
            ]);
        }
        
        // Run other seeders
        $this->call([
            CourseSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
