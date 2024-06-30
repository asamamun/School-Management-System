<?php

namespace App\Http\Controllers;

use App\Models\FeesAssign;
use App\Models\FeesGroup;
use App\Models\FeesMaster;
use App\Models\FeesType;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeesAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feesassigns = FeesAssign::with(['feesmaster.feesgroup', 'standard.section', 'student'])->paginate(10);
        return view('fees.assign.index', compact('feesassigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //use model feesmaster, fees master, student, standard
        $feesgroups = FeesGroup::all();
        $sessions = Standard::select('session')->distinct()->pluck('session');
        return view('fees.assign.create', compact('feesgroups', 'sessions'));
    }
    /**
     * show the form for feestype value in create page use
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $studentIds = $data['student_id'];
        $feesMasterIds = $data['fees_master_ids'];
        $standardId = $data['standard'];

        foreach ($studentIds as $studentId) {
            foreach ($feesMasterIds as $feesMasterId) {
                FeesAssign::create([
                    'fees_master_id' => $feesMasterId,
                    'student_id' => $studentId,
                    'standard_id' => $standardId,
                ]);
            }
        }

        return redirect()->route('feeassign.index')->with('success', 'Fees assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesAssign $feesAssign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesAssign $feesAssign)
    {
        //
    }


    public function getfeestype(Request $request)
    {
        $FeesMaster = FeesMaster::where('fees_group_id', $request->fees_group_id)
            ->with('FeesType')
            ->get();
        return response()->json($FeesMaster);
    }

    public function studentsearch(Request $request)
    {
        $students = Student::where('shift_id', $request->shift_id)
        ->where('standard_id', $request->standard_id)
        ->with('Shift', 'Section')
        ->with('Standard')
        ->get()
        ->toArray();
        return response()->json($students);
    }
}
