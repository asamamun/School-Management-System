@extends('layouts.adminapp', ['title' => 'Admin | Edit Subject'])
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Edit Subject</h2>
        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" required>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $subject->code }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="theory" {{ $subject->type == 'theory' ? 'selected' : '' }}>Theory</option>
                    <option value="practical" {{ $subject->type == 'practical' ? 'selected' : '' }}>Practical</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <select class="form-control" id="version" name="version" required>
                    <option value="bangla" {{ $subject->version == 'bangla' ? 'selected' : '' }}>Bangla</option>
                    <option value="english" {{ $subject->version == 'english' ? 'selected' : '' }}>English</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $subject->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
