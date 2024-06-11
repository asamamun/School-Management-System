<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\User;
use App\Models\Shift;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standards = Standard::paginate(5);
        return view('academic.standard.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'teacher')->get();
        $shifts = Shift::all();
        $sections = Section::all();

        return view('academic.standard.create', compact('users', 'shifts', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'integer'],
            'session' => ['required', 'string', 'max:255'],
            'shift_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
            'version' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, ['bangla', 'english'])) {
                        $fail('The ' . $attribute . ' must be either bangla or english.');
                    }
                }
            ],
            'status' => ['required', 'in:active,inactive'],
        ]);

        Standard::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'session' => $request->session,
            'shift_id' => $request->shift_id,
            'section_id' => $request->section_id,
            'version' => $request->version,
            'status' => $request->status,
        ]);

        return redirect()->route('standards.index')->with('success', 'Standard created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Standard $standard)
    {
        $users = User::all();
        $shifts = Shift::all();
        $sections = Section::all();

        return view('academic.standard.edit', compact('standard', 'users', 'shifts', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Standard $standard)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'integer'],
            'session' => ['required', 'string', 'max:255'],
            'shift_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
            'version' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, ['bangla', 'english'])) {
                        $fail('The ' . $attribute . ' must be either bangla or english.');
                    }
                }
            ],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $standard->update($request->all());

        return redirect()->route('standards.index')->with('success', 'Standard updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standard $standard)
    {
        $standard->delete();
        return redirect()->route('standards.index')->with('success', 'Standard deleted successfully.');
    }
}
