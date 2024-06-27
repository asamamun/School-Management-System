<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view('student.student', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'admission_no' => 'required|unique:students',
            'roll_no' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric|unique:students',
            'session' => 'required',
            'shift_id' => 'required',
            'standard_id' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $standards = Standard::all();
        $sections = Section::all();
        $shifts = Shift::all();
        
        return view('student.edit', compact('student', 'standards', 'sections', 'shifts'));
    }
    

    public function update(Request $request, Student $student)
    {
        // dd($request->all());
        $request->validate([
            'admission_no' => 'required|unique:students,admission_no,'.$student->id,
            'roll_no' => 'required|unique:students,roll_no,'.$student->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'mobile' => 'numeric|unique:students,mobile,'.$student->id,          
            'shift_id' => 'required',
            'standard_id' => 'required',
            'dob' => 'required|date',
            'religion' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'admission_date' => 'required|date',
            'status' => 'required',
        ]);  
        $student->update($request->all());
    
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }
    

    public function destroy(Student $student)
    {
        // dd($student);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}

