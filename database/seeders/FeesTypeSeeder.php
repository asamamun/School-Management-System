<?php

namespace Database\Seeders;

use App\Models\FeesGroup;
use App\Models\FeesType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december','1st term', '2nd term', '3rd term'] as $name) {
            FeesType::factory()->create([
                'name' => $name,
                'code' => $name,
                'description' => $name . ' fees',
                'status' => true
            ]);
        }
        foreach (['monthly', 'exam', 'annual'] as $name) {
            FeesGroup::factory()->create([
                'name' => $name,
                'status' => true
            ]);
        }
    }
}
