<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $requestStandards = Standard::withCount(['students' => function ($query) {
            $query->where('admission_status', 'applied')
                ->whereDoesntHave('enrollment');
        }])
            ->get();
        $admissionRequest = Student::where('admission_status', 'applied')
            ->whereDoesntHave('enrollment')->get()->count();
        // dd($admissionRequest);

        return view('admin.dashboard', compact('admissionRequest'));
    }
}
