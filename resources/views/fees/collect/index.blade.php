@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    @include('fees.collect.searchform')
    <div class="pt-2">
        <div class="table-responsive shadow-lg bg-body-tertiary rounded p-2">
            <table class="table table-sm table-success table-striped table-hover table-bordered">
                <thead class="thead text-center">
                    <tr>
                        <th class="">Student name</th>
                        <th class="">Admission NO</th>
                        <th class="">Class (Section)</th>
                        <th class="">Guardian name</th>
                        <th class="">Mobile number</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody class="tbody" id="studentList">
                    @isset($student)
                        {{-- Single student --}}
                        <tr>
                            <td>{{ $student->first_name ?? '' }} {{ $student->last_name ?? '' }}</td>
                            <td>{{ $student->admission_no ?? '' }}</td>
                            <td>{{ $student->Standard->name ?? '' }} ({{ $student->Section->name ?? '' }})</td>
                            <td>{{ $student->guardian_name ?? '' }}</td>
                            <td>{{ $student->mobile ?? '' }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info"><i class="fa fa-money"></i> Collect</a>
                            </td>
                        </tr>
                    @endisset

                    @isset($studentlist)
                        {{-- List of students --}}
                        @foreach ($studentlist as $student)
                            <tr>
                                <td>{{ $student->first_name ?? '' }} {{ $student->last_name ?? '' }}</td>
                                <td>{{ $student->admission_no ?? '' }}</td>
                                <td>{{ $student->Standard->name ?? '' }} ({{ $student->Section->name ?? '' }})</td>
                                <td>{{ $student->guardian_name ?? '' }}</td>
                                <td>{{ $student->mobile ?? '' }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info"><i class="fa fa-money"></i> Collect</a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset

                    @empty($studentlist)
                        @if (empty($student))
                            <tr>
                                <td colspan="6" class="text-center">No data available.</td>
                            </tr>
                        @endif
                    @endempty
                </tbody>

            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#class_id').change(function() {
                let myClass = $(this).val() ?? -1
                $.ajax({
                    type: 'POST',
                    data: {
                        class_id: myClass
                    },
                    url: "{{ route('getsectionfromclass') }}",
                    success: function(data) {
                        let getsection = '<option value="-1">Select...</option>'
                        $.each(data, function(key, value) {
                            getsection += `<option value="${key}">${value}</option>`
                        })
                        $('#section_id').html(getsection);
                        $('#student_id').html('<option value="-1">Select....</option>');
                    }
                })
            })
            //
            $('#section_id').change(function() {
                let mySection = $(this).val() ?? -1
                let myClass = $('#class_id').val() ?? -1
                $.ajax({
                    type: 'POST',
                    data: {
                        section_id: mySection,
                        class_id: myClass
                    },
                    url: "{{ route('getstudentfromsection') }}",
                    success: function(data) {
                        let getstudent = '<option value="-1">Select...</option>'
                        $.each(data, function(key, value) {
                            getstudent +=
                                `<option value="${value.id}">${value.first_name} ${value.last_name}</option>`
                        })
                        $('#student_id').html(getstudent);
                    }
                })
            })
        })
    </script>
@endsection
