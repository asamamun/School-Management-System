@extends('layouts.main', ['title' => 'Admission'])

@section('content')
<div class="container">
    <h1>Admission Form</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
        <i class="fas fa-chevron-left mr-1"></i>
        <span class="d-none d-sm-inline">Back</span>
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="admission_no">Admission No</label>
            <input type="text" class="form-control" id="admission_no" name="admission_no" required>
        </div>

        <div class="form-group">
            <label for="roll_no">Roll No</label>
            <input type="text" class="form-control" id="roll_no" name="roll_no" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="shift_id">Shift</label>
            <select class="form-control" id="shift_id" name="shift_id" required>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="standard_id">Standard</label>
            <select class="form-control" id="standard_id" name="standard_id" required>
                @foreach ($standards as $standard)
                    <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="section_id">Section</label>
            <select class="form-control" id="section_id" name="section_id" required>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <select class="form-control" id="religion" name="religion" required>
                <option value="">Select Religion</option>
                <option value="muslim">Muslim</option>
                <option value="hindu">Hindu</option>
                <option value="christian">Christian</option>
                <option value="buddhist">Buddhist</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="blood_group">Blood Group</label>
            <select class="form-control" id="blood_group" name="blood_group" required>
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>

        <div class="form-group">
            <label for="admission_date">Admission Date</label>
            <input type="date" class="form-control" id="admission_date" name="admission_date" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="form-group">
            <label for="guardian_name">Guardian Name</label>
            <input type="text" class="form-control" id="guardian_name" name="guardian_name" required>
        </div>

        <div class="form-group">
            <label for="guardian_mobile">Guardian Mobile</label>
            <input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality" required>
        </div>

        <div class="form-group">
            <label for="birth_certificate">Birth Certificate</label>
            <input type="file" class="form-control" id="birth_certificate" name="birth_certificate" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
