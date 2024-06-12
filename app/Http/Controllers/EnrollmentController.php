<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
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
        
        return view('academic.enrollment.index');
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
}
