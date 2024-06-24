<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['exam01', 'exam02', 'exam03'] as $name) {
            Exam::factory()->create([
                'name' => $name,
                'term' => $name,
                'status' => true
            ]);
        }
    }
}
