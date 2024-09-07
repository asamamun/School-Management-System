<?php

namespace App\Http\Controllers;

use App\Models\schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = schedule::all();
        return view('routine.times', compact('schedules'));
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
        // dd($request->all());
        $request->validate([
            'starting_time' => 'required|date_format:H:i',
            'duration' => 'nullable|integer|min:1',
            'total_class' => 'nullable|integer|min:1',
        ]);

        // Delete previous data
        Schedule::truncate();

        // Initialize variables
        $startTime = Carbon::createFromFormat('H:i', $request->starting_time);
        $duration = intval($request->duration ?? 60);
        $totalClass = intval($request->total_class ?? 7);

        // Use Laravel's built-in factory helper to create a new collection
        $classRoutineData = collect();

        for ($i = 0; $i < $totalClass; $i++) {
            $endTime = $startTime->copy()->addMinutes(intval($duration));
            $timeRange = $startTime->format('g:ia').'-'.$endTime->format('g:ia');

            // Use the push method to add new data to the collection
            $classRoutineData->push([
                'time_range' => $timeRange,
                'start_time' => $startTime->format('H:i:s'),
                'end_time' => $endTime->format('H:i:s'),
                'total_time' => $duration,
            ]);

            // Move startTime to the end of this period
            $startTime = $endTime;
        }

        // Insert new data using the Schedule model
        Schedule::insert($classRoutineData->all());

        return redirect()->back()->with('success', 'Class routine saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schedule $schedule)
    {
        //
    }
}
