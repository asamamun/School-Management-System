<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Shift;
use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    public function index(){
        $students = Student::with(['standard', 'section', 'shift'])->paginate(10);
        return view('admission.index', compact('students'));
    }

    public function create(){
        $standards = Standard::all();
        $shifts = Shift::all();
        $sections = Section::all();
        return view('admission.create', compact('standards', 'shifts', 'sections'));
    }

    public function store(Request $request){
        $request->validate([
            'admission_no' => 'required|unique:students,admission_no',
            'roll_no' => 'required|unique:students,roll_no',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'standard_id' => 'required',
            'section_id' => 'required',
            'shift_id' => 'required',
            'dob' => 'required|date',
            'religion' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'admission_date' => 'required|date',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif,svg|max:2048',
        ]);

        $student = new Student($request->except('image'));
        $student->image = $request->file('image')->store('student', 'public');
        $student->save();

        return redirect()->route('admission.index')->with('success', 'Admission created successfully.');
    }
}

