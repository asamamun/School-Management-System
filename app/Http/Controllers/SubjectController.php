<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::paginate(5);

        return view('academic.subjects', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['theory', 'practical'];
        $versions = ['bangla', 'english'];

        return view('academic.subject-create', compact('types', 'versions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|numeric|unique:subjects,code',
            'type' => 'required|in:theory,practical',
            'version' => 'required|in:bangla,english',
            'status' => 'required|boolean',
        ]);

        Subject::create($validatedData);
        return redirect()->route('subject.index')->with('success', 'Subject added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
        return view('academic.subject-edit', compact('subject'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
}
