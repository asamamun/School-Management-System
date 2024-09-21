<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ArtisanController;
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
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentToUserController;
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
/**
 * miration route  
 */
Route::prefix('artisan')->group(function () {
    Route::controller(ArtisanController::class)->group(function(){
        Route::get('/migrate', 'migrate');
        Route::get('/migration/fresh', 'migrationFresh');
        Route::get('/migration/refresh', 'migrationRefresh');
        Route::get('/seed', 'seed');
        Route::get('/optimize-clear', 'optimizeClear');
        Route::get('/clear-cache', 'clearCache');
    });
});

Route::any('/', [UserController::class, 'eiewWelcome']);

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
Route::controller(AdmissionController::class)->group(function () {
    Route::post('admission/search', 'search')->name('student-info');
    Route::get('/admission', 'index')->name('admission.index');
    Route::get('/admission-form/{standard}', 'admissionNow')->name('admission.create');
    Route::post('/admission', 'store')->name('admission.store');
});
/**
 * public route
 */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * use check admin  middleware
 */
Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/admindashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/subjects', SubjectController::class)->names('subject');
    Route::resource('/shifts', ShiftController::class)->names('shift');
    Route::resource('/sections', SectionController::class)->names('section');
    Route::resource('/standards', StandardController::class)->names('standards');
    Route::resource('/students', StudentController::class)->names('student');

    Route::get('/studenttouser/{id}/create', [StudentToUserController::class, 'createUserFromStudent'])->name('studenttouser');
    Route::resource('/feegroups', FeesGroupController::class)->names('feegroup');
    Route::resource('/feetypes', FeesTypeController::class)->names('feetype');
    Route::resource('/feemasters', FeesMasterController::class)->names('feemaster');

    /**
     * EnrollmentController
     */
    Route::resource('enrollments', EnrollmentController::class)->names('enrollment');
    Route::controller(EnrollmentController::class)->group(function () {
        Route::post('/enrollments/search', 'search')->name('enrollment.search');
        Route::post('/getstandardsfromshift', 'getStandards')->name('standatd.getStandardFromShift');
        Route::post('/getsectionsfromstandard', 'getSections')->name('standatd.getSectionsFromStandard');
        Route::post('/getshiftsfromsession', 'getShifts')->name('standatd.getShiftsFromSession');
    });

    /**
     * FeesAssing getfeestype
     */
    Route::resource('/feeassigns', FeesAssignController::class)->names('feeassign');
    Route::controller(FeesAssignController::class)->group(function () {
        Route::post('getfeestype', 'getfeestype')->name('feeassign.getfeestype');
        Route::post('feeassignstudentsearch', 'studentsearch')->name('feeassign.studentsearch');
    });

    /**
     * FeesCollectController
     */
    Route::resource('/feecollects',FeesCollectController::class)->names('feecollect');
    Route::controller(FeesCollectController::class)->group(function () {
        // route use search(admissionNO) search(class_id,section_id pr student_id (feecollect.studentlist))
        Route::post('/feecollect/search', 'SearchByAdmissionNo')->name('feecollect.searchstudent');
        Route::post('/feecollect/searchlist', 'getStudentsFromClass')->name('feecollect.studentlist');
        // ajax(class to section(getSectionFromClass), class+section to student ())
        Route::post('/getsectionfromclass', 'getSectionFromClass')->name('getsectionfromclass');
        Route::post('/getstudentfromsectionandclass', 'getStudentsFromSection')->name('getstudentfromsection');
    });

    /**
     * MarkController
     */
    Route::resource('/marks', MarkController::class)->names('mark');
    Route::controller(MarkController::class)->group(function () {
        Route::post('/marks/search', 'search')->name('mark.search');
        Route::post('/marks/shift', 'getShift')->name('mark.getShift');
        Route::post('/marks/standard', 'getStandard')->name('mark.getStandard');
        Route::post('/marks/subject', 'getSubject')->name('mark.getSubject');
        Route::post('marks/studentSearch', 'studentSearch')->name('mark.studentSearch');
        Route::post('/resultsheets/subject', 'getSubject')->name('resultsheet.getSubject');
    });


    Route::resource('/assignsubjects', SubjectAssignController::class)->names('assignsubject');
    Route::resource('/exams', ExamController::class)->names('exam');
    Route::resource('/grades', GradeController::class)->names('grade');

    /**
     * ResultsheetController
     */
    Route::resource('/resultsheets', ResultsheetController::class)->names('resultsheet');
    Route::controller(ResultsheetController::class)->group(function () {
        Route::post('/resultsheets/search', 'search')->name('resultsheet.search');
        Route::post('/resultsheets/studentSearchResult', 'studentSearchResult')->name('resultsheet.studentSearchResult');
        Route::post('/resultsheets/shift', 'getShift')->name('resultsheet.getShift');
        Route::post('/resultsheets/standard', 'getStandard')->name('resultsheet.getStandard');
    });

    /**
     * attandence routes
     */
    Route::resource('/attendance', AttendanceController::class);
    Route::post('/attendance/search', [AttendanceController::class, 'search'])->name('searchstudentforattendance');

    /**
     * Class Routin
     */
    Route::controller(RoutineController::class)->group(function () {
        Route::get('routines', 'index')->name('routines.index');
        Route::get('routine/create', 'create')->name('routines.create');
        Route::post('routine/store', 'store')->name('routines.store');
        Route::get('routine/{routine}', 'show')->name('routine.show');
    });

    Route::get('schedule', [ScheduleController::class, 'index'])->name('routines.time');
    Route::post('schedule', [ScheduleController::class, 'store'])->name('routinestime.store');
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
