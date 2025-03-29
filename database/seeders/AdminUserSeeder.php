<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, remove any existing admin users
        DB::table('users')->where('usertype', 'admin')->delete();

        // Create new admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lrv.com',
            'password' => Hash::make('admin123'),
            'usertype' => 'admin',
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@lrv.com');
        $this->command->info('Password: admin123');
    }
}
