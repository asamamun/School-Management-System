@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div>
            <p class="h-1">Enrollment index</p>

        </div>
        <div class="p-2">
            <a href="{{ route('enrollment.create') }}" class="btn btn-sm btn-outline-secondary"><i
                    class="fa fa-plus"></i>Create</a>
        </div>
    </div>
    <div class="container mt-3">
        <form action="" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="shift_id" class="input-group-text">Shift</label>
                        <select name="shift_id" id="shift_id" class="form-select">
                            <option value="">Select Shift</option>
                            @foreach ($standards as $standard)
                                <option value="{{ $standard->shift->id }}">{{ $standard->shift->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="standard_id" class="input-group-text">Standards</label>
                        <select name="standard_id" id="standard_id" class="form-select">
                            <option value="">Select Standard</option>
                            @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="section_id" class="input-group-text">Section</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <option value="">Select Section</option>
                            @foreach ($standards as $standard)
                                <option value="{{ $standard->section->id }}">{{ $standard->section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <label for="search" class="input-group-text"><i class="fa fa-search"></i></label>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>





            </div>
        </form>
    </div>
    {{--  --}}
    <div class="container">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Admission No</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
