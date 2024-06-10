<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Shift;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'admission_no' => fake()->unique()->numerify('Y######'),
            'roll_no' => fake()->unique()->numerify('ROLL-######'),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'mobile' => fake()->phoneNumber,
            'email' => fake()->safeEmail,
            'user_id' => null,  // Adjust this if you want to associate a user
            'standard_id' => Standard::factory(),
            'section_id' => Section::factory(),
            'shift_id' => Shift::factory(),
            'dob' => fake()->dateTimeBetween('-18 years', '-15 years')->format('Y-m-d'),
            'religion' => fake()->randomElement(['islam', 'hindu', 'christian', 'buddhist', 'other']),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'blood_group' => fake()->randomElement(['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-']),
            'admission_date' => fake()->date,
            'image' => fake()->imageUrl,
            'guardian_name' => fake()->name,
            'guardian_mobile' => fake()->phoneNumber,
            'address' => fake()->address,
            'nationality' => fake()->country,
            'birth_certificate' => fake()->unique()->numerify('###########'),
            'status' => 'active',
        ];
    }
}

