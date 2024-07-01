<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Resultsheet;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Standard::select('session')->distinct()->pluck('session');
        //    $standards=Standard::select('standard')->where('session',session('name'))->distinct()->pluck('name');

        return view('result.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('result.create');
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
    public function show(Resultsheet $resultsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultsheet $resultsheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultsheet $resultsheet)
    {
    //    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultsheet $resultsheet)
    {
        //
    }
    

    /* Get Shift */
    public function getShift(Request $request)
    {
        $Shift_id = Standard::where('session', $request->session)
            ->where('status', 'active')
            ->pluck('Shift_id');

        $shifts = Shift::whereIn('id', $Shift_id)->pluck('name', 'id');

        return response()->json($shifts);
    }


    /* Get Standard */
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

    /* get student   */
    public function studentSearchResult(Request $request)
    {
    //    dd($request);
    $students = Student::where('standard_id', $request->standard)
    ->with('standard:id,name', 'section:id,name')
    ->get();
    // dd($students);
    $marks=Mark::where('standard_id', $request->standard)
    ->with('student:id,first_name,roll_no', 'standard:id,name')
    ->get();
    $sessions = Standard::select('session')->distinct()->pluck('session');
// dd($marks);
    return view('result.index', compact('students', 'marks','sessions'));
    }

}
