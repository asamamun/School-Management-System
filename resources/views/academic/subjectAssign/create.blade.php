@extends('layouts.adminapp', ['title' => 'Admin | Subject Assign'])

@section('head')
@endsection

@section('content')
    <p>hiuse create</p>
    <form action="{{ route('assignsubject.store') }}" method="POST">
        @csrf
        <select class="form-control" name="standard_id">
            <option value="-1">Select Standards</option>
            @foreach ($standards as $standard)
                <option value="{{ $standard->id }}">
                    <ul>
                        <li>{{ $standard->session }}</li> |
                        <li>{{ $standard->shift->name }}</li> |
                        <li>{{ $standard->name }}</li> |
                        <li>{{ $standard->section->name }}</li>
                    </ul>
                </option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary float-end mt-3" onclick="addSubjectTeacher()">
            <span><i class="fa-solid fa-plus"></i> </span>
            Assign
        </button>
        <table width="100%">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="subjectTeacher">

            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('script')
<script>
    function addSubjectTeacher() {
        var currentRow = $('#subjectTeacher tr').length;
        $('#subjectTeacher').append(
            '<tr>' +
                '<td>' +
                    '<select class="form-control" name="subject_ids[]">' +
                        '<option value="-1">Select Subject</option>' +
                        '@foreach ($subjects as $subject)' +
                            '<option value="{{ $subject->id }}">{{ $subject->name }}</option>' +
                        '@endforeach' +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '<select class="form-control" name="teacher_ids[]">' +
                        '<option value="-1">Select Teacher</option>' +
                        '@foreach ($teachers as $teacher)' +
                            '<option value="{{ $teacher->id }}">{{ $teacher->name }}</option>' +
                        '@endforeach' +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '<button type="button" onclick="removeRow(this)">Remove</button>' +
                '</td>' +
            '</tr>'
        );
    }

    function removeRow(button) {
        $(button).closest('tr').remove();
    }
</script>
@endsection
