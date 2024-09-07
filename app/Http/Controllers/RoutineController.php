<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\schedule;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standardIds = Routine::pluck('standard_id');

        $standards = Standard::whereIn('id', $standardIds)
            ->with([
                'section:id,name',
                'shift:id,name',
                'routines:id,standard_id'
            ])
            ->get();

        return view('routine.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = getWeekDays(['friday']);

        $class_times = Schedule::pluck('time_range')->toArray();
        $subjects = Subject::pluck('name')->toArray();
        $teachers = User::where('role', 'teacher')->pluck('name')->toArray();

        $standards = Standard::all();
        return view('routine.create', compact('standards', 'days', 'class_times', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (is_string($request->input('select_class'))) {
            $request->merge([
                'select_class' => json_decode($request->input('select_class'), true)
            ]);
        }

        $request->validate([
            'select_class' => 'required|array',
            'select_class.id' => 'required|integer',
            'select_class.name' => 'required|string',
            'selected_class' => 'required|integer|exists:standards,id',
            'schedule' => 'required|array',
            'schedule.*.*' => 'required|array',
            'schedule.*.*' => 'required|array',

        ]);

        if (array($request->input('schedule'))) {
            $request->merge([
                'schedule' => json_encode($request->input('schedule'), true)
            ]);
        }


        $routine = new Routine();
        $routine->standard_id = $request->selected_class;
        $routine->routine = $request->schedule;
        $routine->save();

        return redirect()->route('routines.index')->with('success', 'Routine created successfully!');
    }
 

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        $decodedRoutine = json_decode($routine->routine, true);
        $routine->load([
            'standard.shift:id,name',
            'standard.section:id,name'
        ]);

        // dd($decodedRoutine);
        

        return view('routine.show', compact('routine', 'decodedRoutine'));
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
    public function timesIndex()
    {
        return view('routine.times');
    }
}
