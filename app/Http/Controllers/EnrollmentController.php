<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Section;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Standard::select('session')->distinct()->pluck('session');
        return view('academic.enrollment.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $standards = Standard::pluck('name','id');
        $students = Student::all();
        return view('academic.enrollment.create', compact('standards', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        return view('academic.enrollment.edit', compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }

    

    /**
     * use jquery AJAX
     * getShifts request value is session data
     */
    public function getShifts(Request $request)
    {
        $Shift_id = Standard::
        where('session', $request->session)
        ->where('status', 'active')
        ->pluck('Shift_id');

        $shifts = Shift::whereIn('id', $Shift_id)->pluck('name','id');

        return response()->json($shifts);
    }

    public function getStandards(Request $request)
    {
        $standards = Standard::
        where('shift_id', $request->shift_id)
        ->where('session', $request->session)
        ->where('status', 'active')
        ->pluck('name','id');
        return response()->json($standards);
    }
/**
 * session: session,
 * shift_id: shiftid,
 * standard_id: standardid,
 * now get student use student table session, shift_id, standard_id
 */
    public function search(Request $request)
    {
        $students = Student::where('shift_id', $request->shift_id)
        ->where('standard_id', $request->standard_id)
        ->with('Shift', 'Section')
        ->get()
        ->toArray();
        return response()->json($students);


        // $students = Student::where('shift_id', $request->shift_id)
        // ->where('standard_id', $request->standard_id)
        // ->with('Shift', 'Section')
        // ->paginate(10);
        
        // if ($request->ajax()) {
        //     return view('enrollment.pagination', compact('students'))->render();
        // }
        
        // return view('enrollment.index', compact('students'));


        // $students = Student::where(function ($query) use ($request) {
        //     $query->where('session',$request->session)
        //     ->andWhere('shift_id',$request->shift_id)
        //     ->andWhere('standard_id',$request->standard_id);
        // })->get();
        // return response()->json($students);
        
    }
}

/**
 * $students = Student::
 * where('name', 'like', '%' . $request->search . '%')
 * ->get();
 * return response()->json($students);
 */