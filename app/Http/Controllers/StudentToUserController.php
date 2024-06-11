<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentToUserController extends Controller
{
    public function createUserFromStudent($id)
    {
        $student = Student::findOrFail($id);
        
        // dd($student->email);
        if (!User::where('email', $student->email)->exists()) {
            User::create([
                'name' => $student->first_name. ' ' . $student->last_name,
                'email' => $student->email,
                'password' => Hash::make($student->first_name . '12345'),
            ]);
            $student->user_id = User::where('email', $student->email)->first()->id;
        $student->save();
    
            return redirect()->back()->with('success', 'User created successfully.');
        }
    
        return redirect()->back()->with('error', 'User already exists for this student.');
    }
}
