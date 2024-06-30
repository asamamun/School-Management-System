@extends('layouts.adminapp', ['title' => 'Admin | Subject Assign'])

@section('head')
@endsection

@section('content')
    <p>subject assign show</p>
   <h4><a href="{{ route('assignsubject.index') }}" class="btn btn-secondary mb-3">
    <i class="fas fa-chevron-left mr-1"></i>
    Back
</a></h4>

    <div class="container" id="subjectTeacher">
        <p>{{ $standards->name }}</p>
        <table width="100%" class="table table-striped">
            <tr>
                <th>Subject</th>
                <th>Teacher</th>
            </tr>
            <tr>
                <td>
                    @foreach ($standards->subjects as $subject)
                        {{ $subject->name }}
                        <!-- If you want to display the user_id from pivot -->
                        {{-- (Assigned to User ID: {{ $subject->pivot->user_id }}) --}}
                        <br>
                    @endforeach
                </td>
                <td>
                    @foreach ($userNames as $teacher)
                        {{ $teacher }}
                        <br>
                    @endforeach
                </td>
            </tr>
        </table>

    </div>
    <button type="submit" class="btn btn-primary" onclick="printSubjectTeacher()">Save</button>
@endsection

@section('script')
    <script>
        function printSubjectTeacher() {
            var printContents = document.getElementById('subjectTeacher').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
