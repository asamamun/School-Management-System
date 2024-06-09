@extends('layouts.adminapp', [ 'title' => 'Admin'])
@section('content')
<p>shift index</p>
{{-- {{ dd($shifts)}} --}}
<div class="container">
    
    <a href="{{ route('shift.create') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus"></i> Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Duration</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)
                <tr>
                    <td>{{ $shift->name }}</td>
                    <td>{{ $shift->start_time }}</td>
                    <td>{{ $shift->end_time }}</td>
                    <td>{{ $shift->duration }}</td>
                    <td>{{ $shift->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                        <a href="{{ route('shift.edit', $shift) }}" class="btn btn-sm btn-outline-secondary me-2"><i
                            class="fa fa-edit"></i></a>
                        <form action="{{ route('shift.destroy', $shift) }}" method="post">
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

</div>
@endsection 