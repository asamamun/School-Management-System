<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standards = Standard::whereHas('subjects')->with(['subjects' => function ($query) {
            $query->withPivot('user_id');
        }])->get();
        // $standards = Standard::find()->subjects()->get();
        // dd($standards);
        $subjects = Subject::all();
        $teachers = User::where('role', 'teacher')->get();
        return view('academic.subjectAssign.index', compact('standards', 'subjects', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $standards = Standard::with(['shift', 'section'])->get();
        $subjects = Subject::all();
        $teachers = User::get()->where('role', 'teacher');
        // dd($standards);
        // dd($subjects);
        // dd($teachers);
        return view('academic.subjectAssign.create', compact('standards', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'standard_id' => 'required|exists:standards,id',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id',
            'teacher_ids' => 'required|array',
            'teacher_ids.*' => 'exists:users,id',
        ]);

        $standardId = $request->standard_id;
        $subjectIds = $request->subject_ids;
        $teacherIds = $request->teacher_ids;

        $standard = Standard::find($standardId);

        if ($standard) {
            $subjectsWithTeachers = [];
            foreach ($subjectIds as $index => $subjectId) {
                if (isset($teacherIds[$index])) {
                    $subjectsWithTeachers[$subjectId] = ['user_id' => $teacherIds[$index]];
                }
            }

            $standard->subjects()->sync($subjectsWithTeachers);
            return redirect()->route('assignsubject.index')->with('success', 'Subject assigned successfully');
        } else {
            return redirect()->route('assignsubject.create')->with('error', 'Standard not found.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $standards = Standard::find($id);
    $standards->loadMissing(['subjects' => function ($query) {
        $query->withPivot('user_id');
    }]);
    // dd($standards);
    // $teachers = User::where('role', 'teacher')->pluck('name', 'id');
    // dd($teachers);
$userNames = [];

// Iterate through each subject to get the user_id from the pivot table
foreach ($standards->subjects as $subject) {
    $userId = $subject->pivot->user_id;
    $user = User::find($userId);
    if ($user) {
        $userNames[] = $user->name;
    }
}

// Debug user names
// dd($userNames);
        return view('academic.subjectAssign.show', compact('standards', 'userNames'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $standard = Standard::find($id);
        //    dd($standard);
        $standard->subjects()->detach();
        return redirect()->route('assignsubject.index')->with('success', 'Subject unassigned successfully');
    }
}
