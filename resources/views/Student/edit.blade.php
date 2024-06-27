@extends('layouts.adminapp', ['title' => 'Edit student list'])
@section('content')
    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="admission_no">Admission No.</label>
            <input type="text" class="form-control" id="admission_no" name="admission_no" value="{{ $student->admission_no }}" required>
        </div>
        <div class="form-group">
            <label for="roll_no">Roll No.</label>
            <input type="text" class="form-control" id="roll_no" name="roll_no" value="{{ $student->roll_no }}" required>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $student->mobile }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="standard_id">Standard</label>
            <select class="form-control" id="standard_id" name="standard_id" required>
                @foreach ($standards as $standard)
                    <option value="{{ $standard->id }}" {{ $standard->id == $student->standard_id ? 'selected' : '' }}>{{ $standard->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="section_id">Section</label>
            <select class="form-control" id="section_id" name="section_id" required>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ $section->id == $student->section_id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shift_id">Shift</label>
            <select class="form-control" id="shift_id" name="shift_id" required>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}" {{ $shift->id == $student->shift_id ? 'selected' : '' }}>{{ $shift->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ $student->dob }}" required>
        </div>
        <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion" name="religion" value="{{ $student->religion }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="blood_group">Blood Group</label>
            <select class="form-control" id="blood_group" name="blood_group" required>
                <option value="A+" {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $student->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="O+" {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                <option value="AB+" {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $student->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="admission_date">Admission Date</label>
            <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $student->admission_date }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $student->image }}" required>
        </div>
        <div class="form-group">
            <label for="guardian_name">Guardian Name</label>
            <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ $student->guardian_name }}" required>
        </div>
        <div class="form-group">
            <label for="guardian_mobile">Guardian Mobile</label>
            <input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" value="{{ $student->guardian_mobile }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ $student->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $student->nationality }}" required>
        </div>
        <div class="form-group">
            <label for="birth_certificate">Birth Certificate</label>
            <input type="text" class="form-control" id="birth_certificate" name="birth_certificate" value="{{ $student->birth_certificate }}" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $student->status == 'active' ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Status</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
