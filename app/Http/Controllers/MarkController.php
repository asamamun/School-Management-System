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
    public function store(Request $request)
{
    $achievedMarks = $request->achievedMarks;
    $studentIds = $request->student_id;
    $subjectId = $request->subject;
    $standardId = $request->standard;
    $examId = $request->exam;
    $remarks = $request->remarks;

    // Ensure remarks is an array
    if (!is_array($remarks)) {
        $remarks = array_fill(0, count($achievedMarks), $remarks);
    }

    // Array to store grades for each mark
    $grades = [];

    // Iterate through each achieved mark
    foreach ($achievedMarks as $key => $value) {
        if (is_numeric($value)) {
            $grade = Grade::where('marksfrom', '<=', $value)
                          ->where('marksto', '>=', $value)
                          ->first();

            // Store the grade in the array
            $grades[$key] = $grade;

            if ($grade) {
                // Create a new mark instance
                $mark = new Mark();
                $mark->student_id = $studentIds[$key];
                $mark->subject_id = $subjectId;
                $mark->standard_id = $standardId;
                $mark->exam_id = $examId;
                $mark->main = $value;
                $mark->remarks = $grade->remarks ?? '';
                $mark->grade_id = $grade->id;
                $mark->save();
            }
        }
    }

    // Debugging: Check the grades array
    // dd($grades);

    return redirect()->route('mark.index')->with('success', 'Marks have been saved successfully.');
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
        // dd($request->all());
        $standards = Standard::where('shift_id', $request->shift)
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
        $standard = Standard::find($request->standard)->loadMissing('subjects');
        $subjects = $standard->subjects->pluck('name', 'id');
        return response()->json($subjects);
    }
    public function search(Request $request)
    {
        $students = Student::where('standard_id', $request->standard)->get();
        return response()->json($students);
    }


    public function studentSearch(Request $request)
    {
    //    dd($request->all());
    $standards = Standard::where('id', $request->standard)
    ->with('section:id,name', 'shift:id,name')
    ->get();
    $marks=Mark::where('standard_id', $request->standard)
    ->where('subject_id', $request->subject)
    ->with('student:id,first_name,roll_no', 'subject:id,name', 'grade:id,name')
    ->orderBy('main', 'desc')
    ->get();
    $sessions = Standard::select('session')->distinct()->pluck('session');
// dd($marks);
    return view('Examination.mark.index', compact('standards', 'marks','sessions'));
    }
}
