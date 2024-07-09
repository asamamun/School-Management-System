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
        {{-- form-select form-select-sm" required --}}
        <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <h3>You select: {{ $standard->name }}</h3>
                <input type="text" name="classis" id="classis" hidden value="{{ $standard->id }}">
            </div>
            <div class="p-2 m-2 bg-success-subtle shadow-sm p-3 mb-5 rounded">
                <div class="d-flex">
                    <div class="input-group mb-3 m-2">
                        <label for="first_name" class="input-group-text">First name<span
                                class="text-danger">*</span></label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            value="{{ old('first_name') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="last_name" class="input-group-text">Last name<span class="text-danger">*</span></label>

                        <input type="text" name="last_name" id="last_name" class="form-control"
                            value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="input-group mb-3 m-2">
                        <label for="mobile" class="input-group-text">Mobile<span class="text-danger">*</span></label>
                        <input type="text" name="mobile" id="mobile" class="form-control" required
                            value="{{ old('mobile') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="email" class="input-group-text">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="input-group mb-3 m-2">
                        <label for="dob" class="input-group-text">Date of Birth<span
                                class="text-danger">*</span></label>
                        <input type="date" name="dob" id="dob" class="form-control" required
                            value="{{ old('dob') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="religion" class="input-group-text">Religion<span class="text-danger">*</span></label>
                        <select class="form-control" id="religion" name="religion" class="form-select form-select-sm"
                            required>
                            <option value="">Select</option>
                            @foreach ($religion as $religion)
                                <option value="{{ $religion }}" {{ old('religion') == $religion ? 'selected' : '' }}>
                                    {{ $religion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="gender" class="input-group-text">Gender<span class="text-danger">*</span></label>
                        <select class="form-control" id="gender" name="gender" class="form-select form-select-sm"
                            required>
                            <option value="">Select</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender }}" {{ old('gender') == $gender ? 'selected' : '' }}>
                                    {{ $gender }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="blood_group" class="input-group-text">Blood Group<span
                                class="text-danger">*</span></label>
                        <select class="form-control" id="blood_group" name="blood_group" class="form-select form-select-sm"
                            required>
                            <option value="">Select</option>
                            @foreach ($bloodGroups as $bloodGroup)
                                <option value="{{ $bloodGroup }}"
                                    {{ old('blood_group') == $bloodGroup ? 'selected' : '' }}>
                                    {{ $bloodGroup }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex ">
                    <div class="input-group mb-3 m-2">
                        <label for="guardian_name" class="input-group-text">Guardian Name<span
                                class="text-danger">*</span></label>
                        <input type="text" name="guardian_name" id="guardian_name" class="form-control" required
                            value="{{ old('guardian_name') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="guardian_mobile" class="input-group-text">Guardian Mobile<span
                                class="text-danger">*</span></label>
                        <input type="tel" name="guardian_mobile" id="guardian_mobile" class="form-control" required
                            value="{{ old('guardian_mobile') }}">
                    </div>
                    <div class="input-group mb-3 m-2">
                        <label for="address" class="input-group-text">Address<span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" class="form-control" required
                            value="{{ old('address') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
