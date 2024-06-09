@extends('layouts.adminapp', [ 'title' => 'Admin'])
@section('content')
<p>Subject show</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Type</th>
            <th>Version</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->code }}</td>
            <td>{{ $subject->type }}</td>
            <td>{{ $subject->version }}</td>
            <td>{{ $subject->status ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('subject.create') }}" class="btn btn-success">Create</a>
@endsection