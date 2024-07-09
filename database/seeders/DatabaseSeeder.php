<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use App\Models\Subject;
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
        // Create fixed users
        foreach (['admin', 'staff', 'teacher', 'student'] as $name) {
            User::factory()->create([
                'name' => $name,
                'email' => $name . "@gmail.com",
                'role' => $name,
                'password' => bcrypt($name . "12345"),
            ]);
        }

        // Create 15 teachers
        foreach (range(1, 15) as $index) {
            $name = fake()->name();
            User::factory()->create([
                'name' => $name,
                'email' => $name . "@gmail.com",
                'role' => 'teacher',
                'password' => bcrypt('teacher12345'),
            ]);
        }

        // Create fixed shifts
        $shiftIds = [];
        foreach (['morning', 'day'] as $index => $shiftName) {
            $start_time = $index === 0 ? '07:00' :  '12:00';
            $end_time = $index === 0 ? '12:00' :  '17:00';
            $shift = Shift::create([
                'name' => $shiftName,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'duration' => 5,
                'status' => true
            ]);
            $shiftIds[] = $shift->id;
        }

        // Create fixed sections
        $sections = ['a', 'b', 'c', 'd'];
        $sectionIds = [];
        foreach ($sections as $sectionName) {
            $section = Section::create(['name' => $sectionName, 'status' => true]);
            $sectionIds[] = $section->id;
        }

        // Create standards (classes)
        foreach (['Class 01', 'Class 02', 'Class 03', 'Class 04', 'Class 05'] as $className) {
            Standard::create([
                'name' => $className,
                'session' => '2024',
                'shift_id' => fake()->randomElement($shiftIds),
                'section_id' => fake()->randomElement($sectionIds),
                'user_id' => User::where('role', 'teacher')->inRandomOrder()->first()->id,
                'version' => 'bangla',
            ]);
        }

        // Create 10 subjects
        foreach ([
            'Bangla', 'English', 'Math', 'Science', 'Social Science', 'Religion', 'History', 'Geography', 'Civics', 'ICT'
        ] as $subjectname) {
            Subject::create([
                'name' => $subjectname,
                'code' => fake()->unique()->numberBetween(100, 999),
                'status' => '1',
            ]);
        }



        // Call StudentSeeder to handle students and enrollments
        $this->call(
            [
                StudentSeeder::class,
                // EnrollmentSeeder::class,
                FeesTypeSeeder::class,
                ExamSeeder::class,
                GradeSeeder::class
            ]
        );
    }
}
