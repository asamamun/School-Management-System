<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Section;
use App\Models\Shift;
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
        $shiftIds = Shift::pluck('id')->toArray(); // Get all shift ids
        $sectionIds = Section::pluck('id')->toArray(); // Get all section ids

        Standard::all()->each(function ($standard) use ($shiftIds, $sectionIds) {
            $students = Student::factory()->count(40)->create([
                'standard_id' => $standard->id,
                'section_id' => fake()->randomElement($sectionIds),
                'shift_id' => fake()->randomElement($shiftIds),
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
