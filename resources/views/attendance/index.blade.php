@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <div>
        {{-- search form start --}}
        <form action="{{ route('attendance.index') }}" method="POST">
            @csrf
            <div class="pt-4 shadow-sm bg-body-tertiary rounded d-flex justify-content-around">
                <div class="col-md-4">
                    <h3>
                        Search for
                    </h3>
                </div>
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" name="admissionno" id="admissionroll" class="form-control"
                            placeholder="Admission No">
                        <button class="input-group-text" id="searchbyadmission" type="submit"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('searchstudentforattendance') }}" method="POST">
            @csrf
            <div class="row p-2 shadow-sm  bg-body-tertiary rounded">
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="session" class="input-group-text">Session<span class="text-danger">*</span></label>
                        <select name="session" id="session" class="form-select form-select-sm" required>
                            <option value="-1">Select...</option>
                            @foreach ($sessions as $session)
                                <option value="{{ $session }}">{{ $session }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="shift" class="input-group-text">Shift<span class="text-danger">*</span></label>
                        <select name="shift" id="shift" class="form-select form-select-sm" required>
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="standard" class="input-group-text">Class ( Section )<span
                                class="text-danger">*</span></label>
                        <select name="standard" id="standard" class="form-select form-select-sm" required>
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-info ps-2"><i class="fa fa-search"></i>
                        Search</button>
                </div>

            </div>
        </form>
        {{-- search form end --}}

        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <div class="container-fluid mt-3">
                <div class="row p-2">
                    <div class="col">
                        <h3>Attendance</h3>
                    </div>
                    @isset($students[0])
                        <div class="col">
                            <h3>Class: {{ $students[0]->standard->name }}</h3>
                            <input type="hidden" name="standard" id="class" value="{{ $students[0]->standard_id }}">
                        </div>
                        <div class="col">
                            <h3>Section: {{ $students[0]->section->name }}</h3>
                        </div>
                        <div class="col">
                            <h3>Shift: {{ $students[0]->shift->name }}</h3>
                        </div>
                    @else
                        <div class="col">
                            <h3>Class: </h3>
                        </div>
                        <div class="col">
                            <h3>Section: </h3>
                        </div>
                        <div class="col">
                            <h3>Shift: </h3>
                        </div>
                    @endisset
                    <div class="col input-group">
                        <label for="date" class="input-group-text">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}"
                            required>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Class Roll</th>
                            <th>Admi No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($students)
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->roll_no }}</td>
                                    <td>{{ $student->admission_no }}</td>
                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>
                                        <input type="radio" class="btn-check" name="status[{{ $student->id }}]}"
                                            id="present{{ $student->id }}" autocomplete="off" checked value="p">
                                        <label class="btn btn-outline-success" for="present{{ $student->id }}">Present</label>
                                        <input type="radio" class="btn-check" name="status[{{ $student->id }}]}"
                                            id="absent{{ $student->id }}" autocomplete="off" value="a">
                                        <label class="btn btn-outline-danger" for="absent{{ $student->id }}">Absent</label>
                                        <input type="radio" class="btn-check" name="status[{{ $student->id }}]}"
                                            id="late{{ $student->id }}" autocomplete="off" value="L">
                                        <label class="btn btn-outline-warning" for="late{{ $student->id }}">Late</label>
                                    </td>
                                    <td>
                                        <input type="text" name="remarks[{{ $student->id }}]" id="remarks"
                                            class="form-control">
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No students found</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
                @isset($students)
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                @endisset
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // get session 
            $('#session').change(function() {
                var session = $(this).val();
                console.log(session);
                $.ajax({
                    type: "POST",
                    data: {
                        session: session
                    },
                    url: "{{ route('standatd.getShiftsFromSession') }}",
                    success: function(data) {
                        let shifts = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            shifts += `<option value="${key}">${value}</option>`;
                        })
                        $('#shift').html(shifts);
                    }
                });
            })
            // get standards and section
            $('#shift').change(function() {
                let shift = $(this).val();
                let session = $('#session').val();
                $.ajax({
                    type: "POST",
                    data: {
                        shift_id: shift,
                        session: session,
                    },
                    url: "{{ route('standatd.getStandardFromShift') }}",
                    success: function(data) {
                        console.log(data);
                        let getclass = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            getclass += `<option value="${key}">${value}</option>`;
                        })
                        $('#standard').html(getclass);

                    }
                });
            })
        });
    </script>
@endsection
