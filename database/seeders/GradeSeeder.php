<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'name' => 'A+',
                'code' => 'A+',
                'marksfrom' => 80,
                'marksto' => 100,
                'remarks' => 'Good',
                'point' => 5,
            ],
            [
                'name' => 'A',
                'code' => 'A',
                'marksfrom' => 70,
                'marksto' => 79,
                'remarks' => 'Good',
                'point' => 4,
            ],
            [
                'name' => 'A-',
                'code' => 'A-',
                'marksfrom' => 60,
                'marksto' => 69,
                'remarks' => 'Good',
                'point' => 3.5,
            ],
            [
                'name' => 'B+',
                'code' => 'B+',
                'marksfrom' => 50,
                'marksto' => 59,
                'remarks' => 'Good',
                'point' => 3,
            ],
            [
                'name' => 'B',
                'code' => 'B',
                'marksfrom' => 40,
                'marksto' => 49,
                'remarks' => 'Good',
                'point' => 2,
            ],
            [
                'name' => 'C',
                'code' => 'C',
                'marksfrom' => 33,
                'marksto' => 39,
                'remarks' => 'Pass',
                'point' => 1,
            ],
            [
                'name' => 'F',
                'code' => 'F',
                'marksfrom' => 0,
                'marksto' => 32,
                'remarks' => 'Pass',
                'point' => 0,
            ],
        ];

        foreach ($grades as $grade) {
            
            Grade::factory()->create($grade);
        }
    }
}
