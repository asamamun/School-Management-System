<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\User;
use Hamcrest\Type\IsArray;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standards = Standard::all();
        return view('routine.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday'];
        $class_times = ['9:00am-10:00am', '10:00am-11:00am', '11:00am-12:00pm', '12:00pm-1:00pm', '1:00pm-2:00pm', '2:00pm-3:00pm', '3:00pm-4:00pm'];
        $subjects = ['English', 'Maths', 'Science', 'Social Science', 'Bangla', 'Arabic', 'Computer Science', 'Chemistry', 'Physics'];
        $teachers = ['Mr. Smith', 'Ms. Johnson', 'Mr. Brown', 'Ms. Williams', 'Mr. Jones', 'Ms. Garcia', 'Mr. Martinez', 'Ms. Davis', 'Mr. Rodriguez'];

        // $subjects = Subject::all();
        // $teachers = User::where('role', 'teacher')->get();


        $standards = Standard::all();
        return view('routine.create', compact('standards', 'days', 'class_times', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Decode JSON string if 'select_class' is a JSON string
        if (is_string($request->input('select_class'))) {
            $request->merge([
                'select_class' => json_decode($request->input('select_class'), true)
            ]);
        }
        // // Validate the request data
        $request->validate([
            'select_class' => 'required|array',
            'select_class.id' => 'required|integer',
            'select_class.name' => 'required|string',
            'selected_class' => 'required|integer|exists:standards,id',
            'schedule' => 'required|array',
            'schedule.*.*' => 'required|array',
            'schedule.*.*' => 'required|array',

        ]);
        if(array($request->input('schedule'))){
            $request->merge([
                'schedule' => json_encode($request->input('schedule'), true)
            ]);
        }
        // dd($request->schedule);
        $routine = new Routine();
        $routine->standard_id = $request->selected_class;
        $routine->routien = $request->schedule;
        $routine->save();

        return redirect()->route('routines.index')->with('success', 'Routine created successfully!');

    }


    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routine $routine)
    {
        //
    }
}
