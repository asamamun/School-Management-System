@extends('layouts.adminapp', ['title' => 'Admin | Subject Assign'])

@section('head')
@endsection

@section('content')
    <p>subject assign index</p>
    <a href="{{ route('assignsubject.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>
    <div class="container">
        <table width="100%" class="table table-striped">
            <thead>
                <tr>
                    <th>Class&#40;section&#41;</th>
                    <th float="middle">Subject &amp; Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($standards as $standard)
                    <tr>
                        <td>{{ $standard->name . '(' . $standard->section->name . ')' }}</td>
                        <td> 
                            <a href="{{ route('assignsubject.show', $standard->id) }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('assignsubject.edit', $standard->id) }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                            
                            <form action="{{ route('assignsubject.destroy', $standard->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
