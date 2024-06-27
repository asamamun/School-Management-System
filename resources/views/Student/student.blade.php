@extends('layouts.adminapp', ['title' => 'Admin | Student List'])
@section('content')
    <p>Student List</p>
    {{-- {{ dd($students)}} --}}
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Admission No.</th>
                    <th>Roll No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Shift</th>
                    <th>Class&#40;section&#41;</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->admission_no }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->shift->name }}</td>
                        <td>{{ $student->standard->name .'('.$student->section->name.')' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('student.edit', $student) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- {{ route('shift.show', $shift) }} --}}
                                {{-- <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('studenttouser', $student->id) }}" class="btn btn-sm btn-outline-secondary" title="Create user"><i class="fa fa-plus"></i> </a>


                                <form action="{{ route('student.destroy', $student->id) }}" method="post"
                                    onclick="return confirm('Are you sure to delete?')">
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
        {{ $students->links() }}
    </div>
@endsection

