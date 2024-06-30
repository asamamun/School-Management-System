<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Standard::all()->each(function ($standard) {
            $students = Student::factory()->count(40)->create([
                'standard_id' => $standard->id,
                'section_id' => $standard->section_id,
                'shift_id' => $standard->shift_id,
            ]);

            foreach ($students as $student) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'standard_id' => $standard->id,
                    'enrollment_date' => fake()->dateTimeBetween('2021-01-01', '2025-01-31')->format('Y-01-d'),
                ]);
            }
        });
    }
}
