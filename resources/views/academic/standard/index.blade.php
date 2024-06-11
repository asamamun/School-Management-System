@extends('layouts.adminapp', [ 'title' => 'Admin'])
@section('content')
<div class="container">
    <a href="{{ route('standards.create') }}" class="btn btn-outline-primary mb-3 mt-3">Create New Standard</a>
    <h2 class="text-center">Standard Data</h2> <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Teacher</th>
                <th>Session</th>
                <th>Shift</th>
                <th>Section</th>
                <th>Version</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($standards as $standard)
            <tr>
                <td>{{$standard->name}}</td>
                <td>{{$standard->user->name}}</td>
                <td>{{$standard->session}}</td>
                <td>{{$standard->shift->name}}</td>
                <td>{{$standard->section->name}}</td>
                <td>{{$standard->version}}</td>
                <td>{{$standard->status}}</td>
                <td>
                    <a href="{{ route('standards.edit', $standard) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('standards.destroy', $standard) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    {{ $standards->links() }}    
</div>
@endSection
