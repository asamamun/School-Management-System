@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <p>create</p>
    <form action="{{ route('feeassign.store') }}" method="post" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <div class="row">
                    <div class="input-group mb-3">
                        <label for="name" class="input-group-text">Fees Group<span class="text-danger">*</span></label>
                        <select name="feesgroup" id="feesgroup" class="form-select form-select-sm" required>
                            <option value="">Select</option>
                            @foreach ($feesgroups as $feesgroup)
                                <option value="{{ $feesgroup->id }}">{{ $feesgroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <h3>Fees Types</h3>
                    <div class="table-responsive">
                        <input type="hidden" id="page" value="create">
                        <table class="table table-bordered role-table" id="types_table" style="margin-bottom: 0px;">
                            <thead class="thead">
                                <tr>
                                    <th class="purchase mr-4">All <input class="form-check-input" type="checkbox"
                                            id="all_fees_masters"></th>
                                    <th class="purchase">Name</th>
                                    <th class="purchase">Amount (৳)</th>
                                </tr>
                            </thead>
                            <tbody class="tbody" id="fees_types">
                                <tr>
                                    <td colspan="3" class="text-center">No data available.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <label for="Session" class="input-group-text">Session<span class="text-danger">*</span></label>
                            <select name="session" id="session" class="form-select form-select-sm" required>
                                <option value="">Select...</option>
                                @foreach ($sessions as $session)
                                    <option value="{{ $session }}">{{ $session }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <label for="shift_id" class="input-group-text">Shift<span class="text-danger">*</span></label>
                            <select name="shift" id="shift_id" class="form-select form-select-sm" required>
                                <option value="-1">Select...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <label for="class_id" class="input-group-text">Class<span class="text-danger">*</span></label>
                            <select name="standard" id="class_id" class="form-select form-select-sm" required>
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
                <div>
                    <h3>Students List </h3>
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="students_table" style="margin-bottom: 0px;">
                            <thead class="thead">
                                <tr>
                                    <th class="purchase mr-4"><input class="form-check-input" type="checkbox"
                                            id="all_students"> All</th>
                                    <th class="purchase">Admission NO</th>
                                    <th class="purchase">Student name</th>
                                    <th class="purchase">Class (Section)</th>
                                    <th class="purchase">Mobile number</th>
                                </tr>
                            </thead>
                            <tbody class="tbody" id="stList">
                                <tr>
                                    <td colspan="5" class="text-center">No data available.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button id="generateFees" class="btn btn-primary" type="submit"><i class="fa fa-file-import"></i>
                Generate</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('#feesgroup').change(function() {
                let feesgroup_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('feeassign.getfeestype') }}",
                    data: {
                        fees_group_id: feesgroup_id
                    },
                    success: function(data) {
                        let html = '';
                        $.each(data, function(key, value) {
                            // console.log(value);
                            html += `<tr>`;
                            html +=
                                '<td><input class="form-check-input fees_master" type="checkbox" name="fees_master_ids[]"';
                            html +=
                                `value="${value.id}"${value.is_checked ? ' checked' : ''}></td>`;
                            html += `<td>${value.fees_type.name}</td>`;
                            html += `<td>${value.amount}</td>`;
                            html += `</tr>`;

                        });
                        $('#fees_types').html(html);
                    }
                });
            });
            
            $('#all_fees_masters').click(function() {
                $('.fees_master').prop('checked', this.checked);
            });
            $('.fees_master').click(function() {
                if ($('.fees_master:checked').length === $('.fees_master').length) {
                    $('#all_fees_masters').prop('checked', true);
                } else {
                    $('#all_fees_masters').prop('checked', false);
                }
            });
            $('#all_students').click(function() {
                $('.studentlist').prop('checked', this.checked);
            });
            $('.studentlist').click(function() {
                if ($('.studentlist:checked').length === $('.studentlist').length) {
                    $('#all_students').prop('checked', true);
                } else {
                    $('#all_students').prop('checked', false);
                }
            });
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
                let session = $("#session").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('standatd.getStandardFromShift') }}",
                    data: {
                        shift_id: id,
                        session: session,
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
                    url: "{{ route('feeassign.studentsearch') }}",
                    data: data,
                    success: function(data) {
                        console.log(data);
                        let html = '';
                        $.each(data, function(key, value) {
                            html +=
                                `<tr>
                                <td><input class="form-check-input studentlist" type="checkbox" name="student_id[]" value="${value.id}"></td>
                                <td>${value.admission_no}</td>
                                <td>${value.first_name} ${value.last_name}</td>
                                <td>${value.standard.name}(${value.section.name})</td>
                                <td>${value.mobile}</td>
                            </tr>`;
                        });
                        $("#stList").html(html);
                    }
                });
            });
        });
    </script>
@endsection
