@extends('layouts.adminapp', ['title' => 'Admin | Mark'])

@section('head')
@endsection

@section('content')
    <h1>Marksheet</h1>
    <a href="{{ route('mark.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>
    <div class="container mt-3">
        <form action="{{ route('mark.studentSearch') }}" method="post" class="">
            @csrf
            {{-- go to standard  --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="session" class="input-group-text">Session</label>
                        <select name="session" id="session" class="form-control">
                            <option value="">Select...</option>
                            @foreach ($sessions as $session)
                                <option value="{{ $session }}">{{ $session }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="shift" class="input-group-text">Shift</label>
                        <select name="shift" id="shift" class="form-control">
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="standard" class="input-group-text">Class</label>
                        <select name="standard" id="standard" class="form-control">
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label for="subject" class="input-group-text">Subject</label>
                        <select name="subject" id="subject" class="form-control">
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <label for="search" class="input-group-text"><i class="fa fa-search"></i></label>
                        <button type="submit" id="searchBtn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>


    <div class="container-fluid mt-3" id="mark">
        <div class="col">
            <h3>Marks Sheet</h3>
        </div>
        <div class="row p-2 shadow-sm  bg-body-tertiary rounded">
            @isset($standards[0])
                <div class="row">
                    <div class="col-md-4">
                        <h3>Shift: {{ $standards[0]->shift->name }}</h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Class: {{ $standards[0]->name }}</h3>
                        <input type="hidden" name="standard" id="class" value="{{ $standards[0]->id }}">
                    </div>
                    <div class="col-md-4">
                        <h3>Section: {{ $standards[0]->section->name }}</h3>
                    </div>
                @else
                    <div class="col-md-4">
                        <h3>Shift: </h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Class: </h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Section: </h3>
                    </div>
                </div>
            @endisset
            @isset($marks[0])
                <div class="row mt-5">
                    <div class="col-md-12 mt-3">
                        <h3>Subject: {{ $marks[0]->subject->name }}</h3>
                        <input type="hidden" name="subject" id="subject" value="{{ $marks[0]->subject_id }}">
                    </div>
                @else
                    <div class="col-md-12 mt-3">
                        <h3>Subject: No Marks Found</h3>
                    </div>
                </div>
            @endisset
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Achieved</th>
                    <th>Grade</th>
                    <th>Remark</th>
                    <th>position</th>
                </tr>
            </thead>
            <tbody>
                @isset($marks)
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->student->roll_no }}</td>
                            <td>{{ $mark->student->first_name }}</td>
                            <td>{{ $mark->subject->name }}</td>
                            <td>{{ $mark->main }}</td>
                            <td>{{ $mark->grade->name }}</td>
                            <td>{{ $mark->remarks }}</td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No Marks found</td>
                    </tr>
                @endisset
            </tbody>
        </table>
    </div>
    {{-- <button type="submit" class="btn btn-primary" onclick="printSubjectResult()">save</button> --}}
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                // get Shift
                $('#session').change(function() {
                    let session = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('mark.getShift') }}",
                        data: {
                            session: session
                        },
                        success: function(data) {
                            let html = '<option value="-1">Select...</option>';
                            $.each(data, function(key, value) {
                                // console.log(key);
                                html += '<option value="' + key + '">' + value +
                                    '</option>';
                            });
                            $('#shift').html(html);
                        }
                    });
                });
                // get Standard
                $("#shift").change(function() {
                    let id = $(this).val();
                    let session = $("#session").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('mark.getStandard') }}",
                        data: {
                            shift: id,
                            session: session,
                        },
                        success: function(data) {
                            let html = '<option value="-1">Select...</option>';
                            $.each(data, function(key, value) {
                                console.log(value);
                                html += '<option value="' + value.id + '">' + value.name +
                                    '(' +
                                    value.section.name + ')'
                                '</option>';
                            });
                            $("#standard").html(html);
                        }
                    });
                });
                // get Subject
                $("#standard").change(function() {
                    let id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('mark.getSubject') }}",
                        data: {
                            standard: id
                        },
                        success: function(data) {
                            console.log(data);
                            let html = '<option value="-1">Select...</option>';
                            $.each(data, function(key, value) {
                                html += '<option value="' + key + '">' + value +
                                    '</option>';
                            });
                            $("#subject").html(html);
                        }
                    });
                });
            });

            function printSubjectResult() {
                var printContents = document.getElementById('mark').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>
    @endsection
