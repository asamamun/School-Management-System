@extends('layouts.adminapp', ['title' => 'Admin | Shift'])
@section('content')
    <div class="container">
        <h2>Edit Shift</h2>
        <form action="{{ route('shift.update', $shift->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $shift->name }}" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $shift->start_time }}" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" class="form-control" id="end_time" value="{{ $shift->end_time }}" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" class="form-control" id="duration" value="{{ $shift->duration }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" {{ $shift->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $shift->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
