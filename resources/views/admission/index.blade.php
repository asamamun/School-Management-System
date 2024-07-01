@extends('layouts.main', ['title' => 'Admission'])

@section('content')
   <div class="container">
       <h1 class="text-center">Admission List</h1>
       <hr>
       <div>
        <a href="{{ route('admission.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Admission</a>
       </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Session</th>
                <th>Shift</th>
                <th>Section</th>
                <th>Roll</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->standard->session }}</td>
                    <td>{{ $student->standard->shift->name }}</td>
                    <td>{{ $student->standard->section->name }}</td>
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $student->image) }}" alt="" class="img-fluid"
                        style="width:60px; height:60px; object-fit:contain;">
                    </td>
                </tr>
            @endforeach
        </tbody>
   </div>
    </table>
    {{ $students->links() }}
@endsection

