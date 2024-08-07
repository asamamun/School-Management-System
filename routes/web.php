<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeesAssignController;
use App\Http\Controllers\FeesCollectController;
use App\Http\Controllers\FeesGroupController;
use App\Http\Controllers\FeesMasterController;
use App\Http\Controllers\FeesTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsheetController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentToUserController;
use App\Http\Controllers\StudentUserController;
use App\Http\Controllers\SubjectAssignController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('admin.dashboard', absolute: false));
    }
    if (Auth::user()->role === 'teacher') {
        return redirect()->intended(route('teacher.dashboard', absolute: false));
    }
    if (Auth::user()->role === 'staff') {
        return redirect()->intended(route('staff.dashboard', absolute: false));
    }
})->middleware(['auth'])->name('dashboard');

/**
 * public route
 */
Route::post('admission/search', [AdmissionController::class, 'search'])->name('student-info');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::get('/admission-form/{standard}', [AdmissionController::class, 'admissionNow'])->name('admission.create');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
/**
 * public route
 */

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
    Route::post('/enrollments/search', [EnrollmentController::class, 'search'])->name('enrollment.search');
    Route::post('/getstandardsfromshift', [EnrollmentController::class, 'getStandards'])->name('standatd.getStandardFromShift');
    Route::post('/getsectionsfromstandard', [EnrollmentController::class, 'getSections'])->name('standatd.getSectionsFromStandard');
    Route::post('/getshiftsfromsession', [EnrollmentController::class, 'getShifts'])->name('standatd.getShiftsFromSession');
    // FeesAssing getfeestype
    Route::post('getfeestype', [FeesAssignController::class, 'getfeestype'])->name('feeassign.getfeestype');
    Route::post('feeassignstudentsearch', [FeesAssignController::class, 'studentsearch'])->name('feeassign.studentsearch');
    // route use search(admissionNO) search(class_id,section_id pr student_id (feecollect.studentlist))
    Route::post('/feecollect/search', [FeesCollectController::class, 'SearchByAdmissionNo'])->name('feecollect.searchstudent');
    Route::post('/feecollect/searchlist', [FeesCollectController::class, 'getStudentsFromClass'])->name('feecollect.studentlist');
    // ajax(class to section(getSectionFromClass), class+section to student ())
    Route::post('/getsectionfromclass', [FeesCollectController::class, 'getSectionFromClass'])->name('getsectionfromclass');
    Route::post('/getstudentfromsectionandclass', [FeesCollectController::class, 'getStudentsFromSection'])->name('getstudentfromsection');
    Route::resource('/assignsubjects', SubjectAssignController::class)->names('assignsubject');
    Route::resource('/marks', MarkController::class)->names('mark');
    Route::post('/marks/search', [MarkController::class, 'search'])->name('mark.search');
    Route::post('/marks/shift', [MarkController::class, 'getShift'])->name('mark.getShift');
    Route::post('/marks/standard', [MarkController::class, 'getStandard'])->name('mark.getStandard');
    Route::post('/marks/subject', [MarkController::class, 'getSubject'])->name('mark.getSubject');
    Route::resource('/exams', ExamController::class)->names('exam');
    Route::resource('/grades', GradeController::class)->names('grade');
    Route::post('marks/studentSearch', [MarkController::class, 'studentSearch'])->name('mark.studentSearch');
    Route::resource('/resultsheets', ResultsheetController::class)->names('resultsheet');
    Route::post('/resultsheets/search', [ResultsheetController::class, 'search'])->name('resultsheet.search');
    Route::post('/resultsheets/studentSearchResult', [ResultsheetController::class, 'studentSearchResult'])->name('resultsheet.studentSearchResult');
    Route::post('/resultsheets/shift', [ResultsheetController::class, 'getShift'])->name('resultsheet.getShift');
    Route::post('/resultsheets/standard', [ResultsheetController::class, 'getStandard'])->name('resultsheet.getStandard');
    Route::post('/resultsheets/subject', [MarkController::class, 'getSubject'])->name('resultsheet.getSubject');

    /**
     * attandence routes
     */
    Route::resource('/attendance', AttendanceController::class);
    Route::post('/attendance/search', [AttendanceController::class, 'search'])->name('searchstudentforattendance');
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

require __DIR__ . '/auth.php';
