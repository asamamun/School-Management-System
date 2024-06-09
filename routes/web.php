<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStaff;
use App\Http\Middleware\CheckStudent;
use App\Http\Middleware\CheckTeacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware(CheckAdmin::class)->group(function () {
   
//    Route::resource('admin', UserController::class);
// });

// Route::middleware(['auth','admin'])->group(function () {
Route::middleware(CheckAdmin::class)->group(function () {
   Route::get('/admindashboard', [AdminController::class, 'index'])->name('admin.dashboard');
   Route::resource('/subjects', SubjectController::class)->names('subject');
   Route::resource('/shifts', ShiftController::class)->names('shift');
   Route::resource('/sections', SectionController::class)->names('section');

});

Route::middleware(CheckStaff::class)->group(function () {
   //
});
Route::middleware(CheckTeacher::class)->group(function () {
   //
});
Route::middleware(CheckStudent::class)->group(function () {
   //
});

require __DIR__.'/auth.php';
