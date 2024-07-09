@extends('layouts.adminapp', ['title' => 'Admin | Student List'])
@section('content')
    {{-- {{ dd($students)}} --}}
    <div class="container">
        <div>
            <p>Admission request list</p>
            @isset($standards)
                <div class="row">
                    @foreach ($standards as $standard)
                        <div class="col">
                            <div
                                class="row g-0 border bg-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-100 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary-emphasis">Request:
                                        {{ $standard->students_count }}</strong>
                                    <h3 class="mb-0"></h3>
                                    <div class="mb-1 text-body-secondary">Class Name: <strong>{{ strtoupper($standard->name) }}
                                        </strong></div>
                                    <p class="card-text mb-auto"></p>
                                    <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                        Show...
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Admission No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Class&#40;section&#41;</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->admission_no }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->standard->name . '(' . $student->section->name . ')' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('student.edit', $student) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('studenttouser', $student->id) }}"
                                    class="btn btn-sm btn-outline-secondary" title="Create user"><i class="fa fa-plus"></i>
                                </a>
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
