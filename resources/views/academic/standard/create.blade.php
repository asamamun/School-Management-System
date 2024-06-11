@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <div class="container">
        <h2>Create New Standard</h2>
        <form action="{{ route('standards.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Class Teacher</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="session" class="form-label">Session</label>
                <input type="number" name="" id="" value="{{ date('Y') }}" class="form-control">
                {{-- <input type="text" class="form-control" id="session" name="session" required> --}}
            </div>
            <div class="mb-3">
                <label for="shift_id" class="form-label">Shift</label>
                <select class="form-select" id="shift_id" name="shift_id" required>
                    <option value="">Select Shift</option>
                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="section_id" class="form-label">Section </label>
                <select class="form-select" id="section_id" name="section_id" required>
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <select class="form-select" id="version" name="version" required>
                    <option value="bangla">Bangla</option>
                    <option value="english">English</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="active" id="status" name="status" checked>
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
