<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'standard_id' => Standard::factory(),
            'enrollment_date' => fake()->dateTimeBetween('2021-01-01', '2025-01-31')->format('Y-01-d'),
        ];
    }
}
