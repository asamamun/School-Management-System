<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Standard::select('session')->distinct()->pluck('session');
        //    $standards=Standard::select('standard')->where('session',session('name'))->distinct()->pluck('name');

        return view('examination.mark.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::pluck('name', 'id');
        // dd($exams);
        $sessions = Standard::select('session')->distinct()->pluck('session')->toArray();
        // dd($sessions);
        $grades = Grade::all();
        return view('examination.mark.create', compact('sessions', 'exams', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        

        $mark = new Mark();
        $mark->student_id = $request->student_id;
        $mark->subject_id = $request->subject;
        $mark->standard_id = $request->standard;
        $mark->exam_id = $request->exam;
        $mark->main = $request->achievedMarks;
        $mark->remarks = $request->remarks;
        $mark->save();
         
    return back()->with('success', 'Marks have been saved successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        //
    }

    public function getShift(Request $request)
    {
        $Shift_id = Standard::where('session', $request->session)
            ->where('status', 'active')
            ->pluck('Shift_id');

        $shifts = Shift::whereIn('id', $Shift_id)->pluck('name', 'id');

        return response()->json($shifts);
    }

    public function getStandard(Request $request)
    {
        $standards = Standard::where('shift_id', $request->shift_id)
            ->where('session', $request->session)
            ->where('status', 'active')
            ->with('section:id,name')
            ->get(['id', 'name', 'section_id']);
        $response = $standards->map(function ($standard) {
            return [
                'id' => $standard->id,
                'name' => $standard->name,
                'section' => $standard->section // Include the entire section data
            ];
        });

        // Just return the raw standards data first to check if the issue persists
        return response()->json($response);
    }

    public function getSubject(Request $request)
    {
        // $standard = Standard::find($request->standard_id)->get('name', 'id');
        $standard = Standard::find($request->standard_id)->loadMissing('subjects');
        $subjects = $standard->subjects->pluck('name', 'id');
        return response()->json($subjects);
    }
    public function search(Request $request)
    {
        $students = Student::where('standard_id', $request->standard_id)->get();
        return response()->json($students);
    }
}
