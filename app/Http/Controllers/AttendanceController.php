<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Standard::select('session')->distinct()->pluck('session');
        // $attendances = Attendance::all();
        return view('attendance.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->status as $studentId => $values) {
            $attendance = new Attendance([
                'student_id' => $studentId,
                'standard_id' => $request->standard,
                'attendance_date' => $request->date,
                'status' => ($values == 'p') ? 'present' : (($values == 'a') ? 'absent' : 'Late'),
                'remarks' => $request->remarks[$studentId],
            ]);
            $attendance->save();
        }
        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    /**
     * route searchstudentforattendance
     * request (shift, session, standard)
     * 
     */
    public function search(Request $request)
    {
        // dd($request);
        $students = Student::where('standard_id', $request->standard)
        ->with('standard:id,name', 'section:id,name', 'shift:id,name')
        ->get();
        $sessions = Standard::select('session')->distinct()->pluck('session');

        return view('attendance.index', compact('students', 'sessions'));
    }
}
