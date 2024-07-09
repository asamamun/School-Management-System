<?php

namespace App\Http\Controllers;

use App\Models\FeesAssign;
use App\Models\FeesMaster;
use App\Models\Standard;
use App\Models\Shift;
use App\Models\Student;
use App\Models\Section;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use StudentHelper;

class AdmissionController extends Controller
{
    public function index()
    {
        // $students = Student::with(['standard', 'section', 'shift'])->paginate(10);

        $admissionClass = Standard::where('status', 'active')
            ->where('session', date('Y'))
            ->select('name', 'id', 'session')->get();
        return view('admission.index', compact('admissionClass'));
    }
    public function admissionNow(Standard $standard)
    {
        $bloodGroups = get_set_value('students', 'blood_group');
        $genders = get_set_value('students', 'gender');
        $religion = ['islam', 'hindu', 'christian', 'buddhist', 'other'];
        return view('admission.create', compact('standard', 'bloodGroups', 'genders', 'religion'));
    }

    public function create()
    {
        $standards = Standard::all();
        $shifts = Shift::all();
        $sections = Section::all();
        return view('admission.create', compact('standards', 'shifts', 'sections'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'dob' => 'required|date',
            'religion' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'blood_group' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif,svg|max:2048',
        ]);

        // Find the standard and load related models
        $standard = Standard::findOrFail($request->classis)->loadMissing('section', 'shift');

        // Generate new admission and roll numbers
        $paddedAdmissionNo = StudentHelper::generateNewAdmissionNo();
        $paddedRollNo = StudentHelper::generateNewRollNo();

        DB::beginTransaction();
        try {
            // Create new student instance and set attributes
            $student = new Student($request->except('image'));
            $student->image = $request->file('image')->store('student', 'public');
            $student->admission_no = $paddedAdmissionNo;
            $student->roll_no = $paddedRollNo;
            $student->admission_date = now()->format('Y-m-d');
            $student->standard_id = $standard->id;
            $student->section_id = $standard->section->id;
            $student->shift_id = $standard->shift->id;
            $student->status = 'active';
            $student->nationality = 'Bangladesh';

            $student->save();

            // Fetch the fees_master_id
            $fees_master_record = FeesMaster::whereHas('feesGroup', function ($query) {
                $query->where('name', 'annual');
            })->whereHas('feesType', function ($query) {
                $query->where('name', 'Admission');
            })->first();
            // DD($fees_master_record->id, $student->id, $student->standard_id);

            if (!$fees_master_record) {
                Log::error('Fees master record not found for annual Admission fee.');
                return redirect()->back()->withErrors('Unable to assign fees. Please contact admin.');
            }
            $feesAssigns = new FeesAssign;
            $feesAssigns->fees_master_id = $fees_master_record->id;
            $feesAssigns->student_id = $student->id;
            $feesAssigns->standard_id = $student->standard_id;
            $feesAssigns->status = 'unpaid';

            $feesAssigns->save();

            // DD($feesAssigns);

            DB::commit();


            // $fees_master = $fees_master_record->load('feesGroup', 'feesType');
            $fees_master = FeesMaster::whereHas('feesGroup', function ($query) {
                $query->where('name', 'annual');
            })->whereHas('feesType', function ($query) {
                $query->where('name', 'Admission');
            })->whereHas('feesAssigns', function ($query) use ($student) {
                $query->where('student_id', $student->id);
            })->with(['feesGroup:id,name', 'feesType:id,name', 'feesAssigns' => function ($query) use ($student) {
                $query->where('student_id', $student->id)->first();
            }])->first();

            // dd($fees_master);
            $student->standard;
            $student->shift;

            return view(
                'admission.student-info',
                compact('student', 'fees_master')
            )->with('success', 'Admission created successfully, Next payment .');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create admission: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to create admission. Please try again.');
        }
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'StudentInfo' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!admissionNoOrEmailExists($value)) {
                        $fail('The selected Admission No / Email is invalid.');
                    }
                },
            ],
        ]);
        $studentInfo = $validatedData['StudentInfo'];
        $student = Student::where('admission_no', $studentInfo)->orWhere('email', $studentInfo)->first();


        if (!$student) {
            return redirect()->back()->withErrors('The selected Admission No / Email is invalid.');
        }


        $fees_master = FeesMaster::whereHas('feesGroup', function ($query) {
            $query->where('name', 'annual');
        })->whereHas('feesType', function ($query) {
            $query->where('name', 'Admission');
        })->whereHas('feesAssigns', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->with(['feesGroup:id,name', 'feesType:id,name', 'feesAssigns' => function ($query) use ($student) {
            $query->where('student_id', $student->id)->first();
        }])->first();
        $student->standard;
        $student->shift;

        return view('admission.student-info', compact('student', 'fees_master'));
    }
    public function show(Student $student)
    {
        $student->load('standard:', 'section', 'shift');

        return view('admission.show', compact('student'));
    }
}
