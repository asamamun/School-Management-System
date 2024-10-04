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
    public function routeClear(){
        Artisan::call('route:clear');
        return 'Routes cache cleared successfully!';
    }

    public function viewClear(){
        Artisan::call('view:clear');
        return 'Views cache cleared successfully!';
    }

    public function storageLink(){
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    }

    public function customStorageLink(){
        $targetFolder = storage_path('app/public');
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/school-management/storage';

        try {
            if (file_exists($linkFolder)) {
                unlink($linkFolder);
            }

            if (!file_exists($linkFolder)) {
                symlink($targetFolder, $linkFolder);
                mkdir($linkFolder, 0777, true);
            }
        } catch (\Exception $e) {
            return 'Custom storage link could not be created!';
        }

        return 'Custom storage link created successfully!';
    }
}
