@extends('layouts.adminapp', ['title' => 'Admin | Result'])

@section('head')
@endsection
@section('content')
    <p>result index</p>
    <a href="{{ route('resultsheet.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>
    {{-- search form start --}}
    <form action="{{ route('resultsheet.index') }}" method="POST">
        @csrf
        <div class="pt-4 shadow-sm bg-body-tertiary rounded d-flex justify-content-around">
            <div class="col-md-4">
                <h3>
                    Search for
                </h3>
            </div>
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input type="text" name="admissionno" id="admissionroll" class="form-control" placeholder="Admission No">
                    <button class="input-group-text" id="searchbyadmission" type="submit"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('resultsheet.studentSearchResult') }}" method="POST">
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
    <div class="container">
        <table width="100%" class="table table-striped">
            <thead>
                <tr>
                    <th>Class&#40;section&#41;</th>
                    <th>Student</th>
                    <th>Result Card</th>
                </tr>
            </thead>
            <tbody>
                {{-- @isset($students)
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->standard->name }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>
                                <a href="{{ route('assignsubject.show', $standard->id) }}"
                                    class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endisset --}}



            </tbody>
        </table>
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
                    url: "{{ route('resultsheet.getShift') }}",
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
                    url: "{{ route('resultsheet.getStandard') }}",
                    data: {
                        shift_id: id,
                        session: session,
                    },
                    success: function(data) {
                        let html = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            html += '<option value="' + value.id + '">' + value.name +
                                '(' +
                                value.section.name + ')'
                            '</option>';
                        });
                        $("#standard").html(html);
                    }
                });
            });
        });
    </script>
@endsection
