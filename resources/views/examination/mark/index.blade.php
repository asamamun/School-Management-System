@extends('layouts.adminapp', ['title' => 'Admin | Mark'])

@section('head')
@endsection

@section('content')
    <p>mark index</p>

    <a href="{{ route('mark.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>
    <div class="container mt-3">
        <form action="{{ route('mark.studentSearch') }}" method="post" class="">
            @csrf
            {{-- go to standard  --}}
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="Session" class="input-group-text">Session</label>
                        <select name="session" id="session" class="form-control">
                            <option value="">Select...</option>
                            @foreach ($sessions as $session)
                                <option value="{{ $session }}">{{ $session }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="shift_id" class="input-group-text">Shift</label>
                        <select name="shift" id="shift_id" class="form-control">
                            <option value="-1">Select...</option>

                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="standard_id" class="input-group-text">Class</label>
                        <select name="standard" id="standard_id" class="form-control">
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
            <hr>

        </form>
        <div class="container-fluid mt-3">
            <div class="row p-2">
                <div class="col">
                    <h3>Marks</h3>
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
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Achieved</th>
                        <th>Grade</th>
                        <th>Remark</th>
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

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No students found</td>
                        </tr>
                    @endisset
                </tbody>
            </table>

            </form>
    </div>
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
                        $('#shift_id').html(html);
                    }
                });
            });
            // get Standard
            $("#shift_id").change(function() {
                let id = $(this).val();
                let session = $("#session").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('mark.getStandard') }}",
                    data: {
                        shift_id: id,
                        session: session,
                    },
                    success: function(data) {
                        let html = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            console.log(value.id);
                            html += '<option value="' + value.id + '">' + value.name +
                                '(' +
                                value.section.name + ')'
                            '</option>';
                        });
                        $("#standard_id").html(html);
                    }
                });
            });
        });
    </script>
@endsection
