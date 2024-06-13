<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index(){
        $standards = Standard::with(['shift', 'section'])->get();

        return view('admission.index',compact('standards'));
    }
    
}
