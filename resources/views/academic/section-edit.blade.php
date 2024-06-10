@extends('layouts.adminapp', ['title' => 'Admin | Section'])
@section('content')
    <div class="container">
        <h2>Edit Section</h2>
        <form action="{{ route('section.update', $section->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $section->name }}" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $section->status == "active" ? "checked" : "" }}>
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

