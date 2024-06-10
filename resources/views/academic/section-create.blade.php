@extends('layouts.adminapp', ['title' => 'Admin | Section'])
@section('content')
    <div class="container">
        <h2>Create New Section</h2>
        <form action="{{ route('section.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked>
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
