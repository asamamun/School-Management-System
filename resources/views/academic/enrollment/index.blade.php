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
                        <label for="class_id" class="input-group-text">Class</label>
                        <select name="class" id="class_id" class="form-control">
                            <option value="-1">Select...</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <label for="search" class="input-group-text"><i class="fa fa-search"></i></label>
                        <button type="button" id="searchBtn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            <hr>
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
            <tbody id="studentListkkkkk">
                
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#session').change(function() {
                let session = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('standatd.getShiftsFromSession') }}",
                    data: {
                        session: session
                    },
                    success: function(data) {
                        let html = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            html += '<option value="' + key + '">' + value +
                                '</option>';
                        });
                        $('#shift_id').html(html);
                    }
                });
            });


            $("#shift_id").change(function() {
                let id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('standatd.getStandardFromShift') }}",
                    data: {
                        shift_id: id
                    },
                    success: function(data) {
                        let options = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + key + '">' + value +
                                '</option>';
                        });
                        $("#class_id").html(options);
                    }
                });
            });


            $("#searchBtn").click(function() {
                let session = $("#session").val();
                let shiftid = $("#shift_id").val();
                let standardid = $("#class_id").val();

                if (session == -1 || shiftid == -1 || standardid == -1) {
                    alert("Please select all option");
                    return;
                }

                let data = {
                    shift_id: shiftid,
                    standard_id: standardid,
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('enrollment.search') }}",
                    data: data,
                    success: function(data) {
                        // console.log(data);
                        let html = '';
                        $.each(data, function(key, value) {
                            // console.log(key);
                            // console.log(value);
                            html += '<tr>';
                            html += '<td>' + value.first_name + ' ' + value.last_name + '</td>';
                            html += '<td>' + value.roll_no + '</td>';
                            html += '<td>' + value.admission_no + '</td>';
                            html += '<td>' + value.date + '</td>';
                            html += '<td>' + value.mobile + '</td>';
                            html += '<td>' + value.action + '</td>';
                            html += '</tr>';
                        });
                        $("#studentListkkkkk").html(html);
                    }
                });
            });

        });
    </script>
@endsection
