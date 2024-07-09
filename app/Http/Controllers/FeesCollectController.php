<?php

namespace App\Http\Controllers;

use App\Models\FeesAssign;
use App\Models\FeesCollect;
use App\Models\FeesMaster;
use App\Models\Shift;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PhpParser\Node\Stmt\TryCatch;

class FeesCollectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standards = Standard::whereHas('feesAssigns')->get();
        return view('fees.collect.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fees.collect.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'collect' => 'required|array',
            'payment_type' => 'required',
            'trxid' => $request->payment_type !== 'Cash' ? 'required' : 'nullable',
            'note' => 'required',
        ]);

        foreach ($request->collect as $feesAssignId) {
            $feesAssign = FeesAssign::with('feesMaster')->find($feesAssignId);
            if ($feesAssign && $feesAssign->feesMaster) {
                $feesCollect = new FeesCollect();
                $feesCollect->fees_assign_id = $feesAssignId;
                $feesCollect->payment_type = $request->payment_type;
                $feesCollect->trxid = $request->trxid;
                $feesCollect->amount = $feesAssign->feesMaster->amount;
                $feesCollect->date = date('Y-m-d');
                $feesCollect->note = $request->note;
                $feesCollect->save();

                $feesAssign->status = 'paid';
                $feesAssign->save();
            } else {
                return redirect()->route('feecollect.index')->with('error', 'Fees or Fees Master not found');
            }
        }

        return redirect()->route('feecollect.index')->with('success', 'Fees collected successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $student = Student::find($id);
        $student->load('standard', 'shift');

        $fessassigned = FeesAssign::where('student_id', $id)
            ->with('feesmaster.feesgroup', 'feesmaster.feestype')
            ->get();

        // dd($student, $fessassigned);

        return view('fees.collect.show', compact('student', 'fessassigned'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesCollect $feesCollect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesCollect $feesCollect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesCollect $feesCollect)
    {
        //
    }

    /**
     * get admission no by from
     */
    public function SearchByAdmissionNo(Request $request)
    {
        if ($request->admissionno) {
            $student = Student::where('admission_no', $request->admissionno)
                ->with('standard', 'section')
                ->whereHas('feesAssigns')
                ->first();
            $standards = Standard::whereHas('feesAssigns')->get();
            return view('fees.collect.index', compact('student', 'standards'));
        }

        return redirect()->back();
    }

    /**
     * get section from class id
     * $request class_id
     */
    public function getSectionFromClass(Request $request)
    {
        $sections = Standard::where('id', $request->class_id)
            ->with('section:id,name')
            ->get()
            ->pluck('section.name', 'section.id')
            ->toArray();
        return response()->json($sections);
    }
    /**
     * this function value set in option value
     *
     */
    public function getStudentsFromSection(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => ['required', 'exists:standards,id'],
            'section_id' => ['required', 'exists:sections,id'],
        ]);
        $students = Student::where('standard_id', $validatedData['class_id'])
            ->where('section_id', $validatedData['section_id'])
            ->whereHas('feesAssigns')
            ->get()->toArray();
        return response()->json($students);
    }
    /**
     * okay
     */
    public function getStudentsFromClass(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => ['required', 'exists:standards,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'student_id' => ['required'],
        ]);

        if ($request->class_id && $request->section_id && $request->student_id && $request->student_id !== '-1') {
            $student = Student::where('id', $request->student_id)
                ->with('Standard', 'Shift')
                ->whereHas('feesAssigns')
                ->first();
            $standards = Standard::whereHas('feesAssigns')->get();
            return view('fees.collect.index', compact('student', 'standards'));
        } elseif ($request->class_id && $request->section_id && $request->student_id === '-1') {
            $studentlist = Student::where('standard_id', $request->class_id)
                ->where('section_id', $request->section_id)
                ->whereHas('feesAssigns')
                ->get();
            $standards = Standard::whereHas('feesAssigns')->get();
            return view('fees.collect.index', compact('studentlist', 'standards'));
        }

        return redirect()->back();
    }
}
