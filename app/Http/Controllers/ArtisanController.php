<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ArtisanController extends Controller
{
    public function migrate(){
         Artisan::call('migrate');
        return 'Migration ran successfully!';
    }
    public function migrationFresh(){
        Artisan::call('migrate:fresh');
        return 'Database migrated fresh successfully!';
    }
    public function migrationRefresh(){
        Artisan::call('migrate:refresh');
        return 'Database migrated refresh successfully!';
    }
    public function seed() {

        $hasData = DB::table('users')->count() > 0;
    
        if (!$hasData) {
            Artisan::call('db:seed');
            return 'Database seeded successfully!';
        } else {
            return 'Database already has data. Seeding skipped.';
        }
    }
    
    public function optimizeClear(){
        Artisan::call('optimize:clear');
        return 'Optimized files cleared successfully!';
    }
    public function clearCache(){
        Artisan::call('cache:clear');
        return 'Cache cleared successfully!';
    }
    // public function migrationFresh(){
    // }
}
