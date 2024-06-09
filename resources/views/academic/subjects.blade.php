@extends('layouts.adminapp', ['title' => 'Admin | Subject'])
@section('content')
    <p>Subject show</p>
    <a href="{{ route('subject.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>
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
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->type }}</td>
                    <td>{{ $subject->version }}</td>
                    <td>{{ $subject->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('subject.edit', $subject) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fa fa-edit"></i>
                            </a>
                            {{-- {{ route('subject.show', $subject) }} --}}
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye"></i>
                            </a>

                            <form action="{{ route('subject.destroy', $subject) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-2">
        {{ $subjects->links() }}
    </div>
@endsection
