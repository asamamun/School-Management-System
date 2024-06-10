@extends('layouts.adminapp', ['title' => 'Admin | Shift'])
@section('content')
    <div class="container">
        <h2>Create New Shift</h2>
        <form action="{{ route('shift.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" class="form-control" id="start_time" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" class="form-control" id="end_time" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" class="form-control" id="duration" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
