<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        foreach (['admin', 'staff', 'teacher', 'student'] as $name) {
            User::factory()->create([
                'name' => $name,
                'email' => $name . "@gmail.com",
                'role' => $name,
                'password' => $name."12345",
            ]);
        }
    }
}
