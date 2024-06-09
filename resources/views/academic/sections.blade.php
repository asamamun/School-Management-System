@extends('layouts.adminapp', [ 'title' => 'Admin | Section'])
@section('content')
<p>section index</p>
<div class="container">
    
    <a href="{{ route('section.create') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus"></i>Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center"> 
                        <a href="{{ route('section.edit', $section) }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('section.destroy', $section) }}" method="post">
                            @csrf
                            @method('delete')
                            
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection 