<?php

namespace Database\Seeders;

use App\Models\FeesGroup;
use App\Models\FeesMaster;
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
        $names = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', '1st term', '2nd term', '3rd term', 'Admission'];
        $feeTypes = collect(array_map(function ($name) {
            return [
                'name' => $name,
                'code' => $name,
                'description' => \Illuminate\Support\Str::random(20),
                'status' => true
            ];
        }, $names));
        FeesType::insert($feeTypes->toArray());

        $names = ['monthly', 'exam', 'annual'];
        $feeGroups = collect(array_map(function ($name) {
            return [
                'name' => $name,
                'status' => true
            ];
        }, $names));
        FeesGroup::insert($feeGroups->toArray());

        $master = FeesMaster::create([
            'fees_group_id' => FeesGroup::where('name', 'annual')->first()->id,
            'fees_type_id' => FeesType::where('name', 'Admission')->first()->id,
            'duedate' => now()->addMonths(6),
            'amount' => 2000,
        ]);
        foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'] as $month) {
            $master = FeesMaster::create([
                'fees_group_id' => FeesGroup::where('name', 'monthly')->first()->id,
                'fees_type_id' => FeesType::where('name', $month)->first()->id,
                'duedate' => now()->addMonths(6),
                'amount' => 500,
            ]);
        }
        foreach (['1st term', '2nd term', '3rd term'] as $exam) {
            $master = FeesMaster::create([
                'fees_group_id' => FeesGroup::where('name', 'exam')->first()->id,
                'fees_type_id' => FeesType::where('name', $exam)->first()->id,
                'duedate' => now()->addMonths(6),
                'amount' => 1000,
            ]);
        }
    }
}
