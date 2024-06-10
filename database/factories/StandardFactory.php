<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Standard>
 */
class StandardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['01', '02', '03', '04', '05']),
            'user_id' => User::where('role', 'teacher')->inRandomOrder()->first()->id,
            'session' => fake()->randomElement(['2020', '2021', '2022', '2023', '2024']),
            'shift_id' => Shift::inRandomOrder()->first()->id,
            'section_id' => Section::inRandomOrder()->first()->id,
        ];
    }
}
