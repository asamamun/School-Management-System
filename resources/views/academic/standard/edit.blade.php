@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <div class="container">
        <h2>Edit standards</h2>
        <form action="{{ route('standards.update', $standard->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $standard->name }}" required>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $standard->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="session" class="form-label">Session</label>
                <input type="text" class="form-control" id="session" name="session" value="{{ $standard->session }}" required>
            </div>
            <div class="mb-3">
                <label for="shift_id" class="form-label">Shift ID</label>
                <select class="form-select" id="shift_id" name="shift_id" required>
                    <option value="">Select Shift</option>
                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}" {{ $shift->id == $standard->shift_id ? 'selected' : '' }}>{{ $shift->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="section_id" class="form-label">Section ID</label>
                <select class="form-select" id="section_id" name="section_id" required>
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" {{ $section->id == $standard->section_id ? 'selected' : '' }}>{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <select class="form-select" id="version" name="version" required>
                    <option value="bangla" {{ $standard->version == 'bangla' ? 'selected' : '' }}>Bangla</option>
                    <option value="english" {{ $standard->version == 'english' ? 'selected' : '' }}>English</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="active" id="status" name="status" {{ $standard->status == 'active' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

