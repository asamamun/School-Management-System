<?php

use App\Http\Controllers\ProfileController;
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
Route::middleware(CheckAdmin::class)->group(function () {
   
   Route::resource('admin', UserController::class);
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
