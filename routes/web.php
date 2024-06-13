<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeesAssignController;
use App\Http\Controllers\FeesCollectController;
use App\Http\Controllers\FeesGroupController;
use App\Http\Controllers\FeesMasterController;
use App\Http\Controllers\FeesTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentToUserController;
use App\Http\Controllers\StudentUserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStaff;
use App\Http\Middleware\CheckStudent;
use App\Http\Middleware\CheckTeacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
   if (Auth::user()->role ==='admin') {
       return redirect()->intended(route('admin.dashboard', absolute:false));
   }
   if (Auth::user()->role ==='teacher') {
       return redirect()->intended(route('teacher.dashboard', absolute:false));
   }
   if (Auth::user()->role ==='staff') {
       return redirect()->intended(route('staff.dashboard', absolute:false));
   }
})->middleware(['auth'])->name('dashboard');

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
   Route::resource('/standards', StandardController::class)->names('standards');
   Route::resource('/students', StudentController::class)->names('student');
   Route::resource('/enrollments', EnrollmentController::class)->names('enrollment');
   Route::get('/studenttouser/{id}/create', [StudentToUserController::class, 'createUserFromStudent'])->name('studenttouser');
   Route::resource('/feegroups', FeesGroupController::class)->names('feegroup');
   Route::resource('/feetypes', FeesTypeController::class)->names('feetype');
   Route::resource('/feemasters', FeesMasterController::class)->names('feemaster');
   Route::resource('/feeassigns', FeesAssignController::class)->names('feeassign');
   Route::resource('/feecollects', FeesCollectController::class)->names('feecollect');

});

Route::middleware(CheckStaff::class)->group(function () {
   //
});
Route::middleware(CheckTeacher::class)->group(function () {
   Route::get('/teacherdashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');

});
Route::middleware(CheckStudent::class)->group(function () {
   //
});

require __DIR__.'/auth.php';
