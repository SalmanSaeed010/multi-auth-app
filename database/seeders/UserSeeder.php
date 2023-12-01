<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Admin user
        User::factory()->create([
            'email' => 'admin@devbunch.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        // Teacher user
        User::factory()->create([
            'email' => 'teacher@devbunch.com',
            'password' => bcrypt('12345678'),
            'role' => 'teacher',
        ]);

        // Student user
        User::factory()->create([
            'email' => 'student@devbunch.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
