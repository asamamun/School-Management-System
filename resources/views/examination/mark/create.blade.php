@extends('layouts.adminapp', ['title' => 'Admin | MarkCreate'])

@section('head')
@endsection

@section('content')
    <p>mark create </p>

    <div class="container mt-3">
        <form action="{{ route('mark.store') }}" method="post" class="">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col md-4">
                        <div class="input-group mb-3">
                            <label for="session" class="input-group-text">Session</label>
                            <select name="session" id="session" class="form-control">
                                <option value="-1">Select...</option>
                                @foreach ($sessions as $session)
                                    <option value="{{ $session }}">{{ $session }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="input-group mb-3">
                            <label for="shift" class="input-group-text">Shift</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="-1">Select...</option>

                            </select>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="input-group mb-3">

                            <label for="standard" class="input-group-text">Class &#40;section&#41;</label>
                            <select name="standard" id="standard" class="form-control">
                                <option value="-1">Select...</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col md-4">
                        <div class="input-group mb-3">
                            <label for="exam" class="input-group-text">Exam Type</label>
                            <select name="exam" id="exam" class="form-control">
                                <option value="-1">Select...</option>
                                @foreach ($exams as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="input-group mb-3">
                            <label for="subject" class="input-group-text">Subject</label>
                            <select name="subject" id="subject" class="form-control">
                                <option value="-1">Select...</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div>

                <input type="number" name="totalmarks" id="studentmarks" class="form-control"
                    placeholder="Enter Total Marks" required>
                <div class="input-group mb-3 mt-3">
                    <label for="search" class="input-group-text"><i class="fa fa-search"></i></label>
                    <button type="button" id="searchBtn" class="btn btn-primary">Get Student</button>
                </div>
                <table width="100%" class="table table-striped">
                    <thead>
                        <caption>Student List</caption>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>Acheived</th>
                        </tr>
                    </thead>
                    <tbody id="studentList">

                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
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
                            console.log(value.id);
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
                        standard: id,
                    },
                    success: function(data) {
                        let options = '<option value="-1">Select...</option>';
                        // console.log(data);
                        $.each(data, function(key, value) {
                            // options += '<option value="' + key + '">' + value '</option>';
                            options += `<option value="${key}">${value}</option>`;
                        });
                        $("#subject").html(options);
                    }
                });
            });

            // search
            $("#searchBtn").click(function() {
                let session = $("#session").val();
                let shiftid = $("#shift").val();
                let standardid = $("#standard").val();
                let examid = $("#exam").val();
                let subjectid = $("#subject").val();
                let totalmarks = $("#studentmarks").val();


                if (session == -1 || shiftid == -1 || standardid == -1 || examid == -1 || subjectid == -1 ||
                    totalmarks == false) {
                    alert("Please select all option");
                    return;
                }

                let data = {
                    standard: standardid,
                    // marks:totalmarks
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('mark.search') }}",
                    data: data,
                    success: function(data) {
                        generateList(data);
                    }
                });
            });

            function generateList(data) {
                let totalmarks = $("#studentmarks").val();
                let html = '';
                // console.log(data);
                $.each(data, function(key, value) {
                    // console.log(value);
                    html += `
                            <tr>
                                <td>${value.roll_no}</td>
                              <td>
                    <input type="hidden" name="student_id[]" value="${value.id}">
                    <input type="text" name="student_name[]" value="${value.first_name}" readonly>
                </td>
                                <td><input type="number" name="marks[]" value="${totalmarks}" readonly></td>
                                <td><input type="number" name="achievedMarks[]" value="0" min="0" max="${totalmarks}"></td>
                               
                            </tr>
                            `;
                });
                $('#studentList').html(html);
            }
            // confirmation on marks
            $('#submitButton').click(function(event) {
                let totalmarks = $("#studentmarks").val();
                let showConfirmation = false;

                $('input[name="marks[]"]').each(function() {
                    if (parseFloat($(this).val()) > parseFloat(totalmarks)) {
                        showConfirmation = true;
                        return false; // Exit the loop early
                    }
                });
            });

        });
    </script>
@endsection
