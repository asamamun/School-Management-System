@extends('layouts.adminapp', ['title' => 'Admin | Routine assign | Create'])

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-3">Class Routine</h1>

        <form action="{{ route('routines.store') }}" method="post" id="routineForm">
            @csrf
            <div class=" d-flex justify-content-between align-items-center ">
                <div class="">
                    <a href="{{ route('routines.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="">
                    <div class="input-group">
                        <label class="input-group-text" for="select_class">Select Class:</label>
                        <select name="select_class" id="select_class" class="form-select">
                            <option value="">Select a class</option>
                            @foreach ($standards as $standard)
                                <option
                                    value="{{ json_encode(['id' => $standard->id, 'name' => $standard->name]) }}"
                                    {{ old('select_class') == json_encode(['id' => $standard->id, 'name' => $standard->name]) ? 'selected' : '' }}>
                                    {{ $standard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="rounded border border-5 mt-2 mb-3">
                <h2 class="text-center m-2">Routine for <i id="selected_class_name"></i></h2>
            </div>
            <div>
                <input type="hidden" name="selected_class" value="" id="selected_clas_id">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Time</th>
                                @foreach ($days as $day)
                                    <th><?= ucfirst($day) ?></th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_times as $time)
                                <tr>
                                    <td class="fw-bold">{{ $time }}</td>
                                    @foreach ($days as $day)
                                        @php
                                            // Correct variable names
                                            $subjectId = 'subjects_' . str_replace(':', '_', $day . '_' . $time);
                                            $teacherId = 'teachers_' . str_replace(':', '_', $day . '_' . $time);
                                        @endphp
                                        <td>
                                            <select name="schedule[{{ $day }}][{{ $time }}][subjects]"
                                                id="{{ $subjectId }}" class="form-select form-select-sm mb-2">
                                                <option value="">Select</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject }}"
                                                        {{ old("schedule.$day.$time.subjects", '') == $subject ? 'selected' : '' }}>
                                                        {{ $subject }}</option>
                                                @endforeach
                                            </select>
                                            <select name="schedule[{{ $day }}][{{ $time }}][teachers]"
                                                id="{{ $teacherId }}" class="form-select form-select-sm">
                                                <option value="">Select</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher }}"
                                                        {{ old("schedule.$day.$time.teachers", '') == $teacher ? 'selected' : '' }}>
                                                        {{ $teacher }}</option>
                                                @endforeach
                                            </select>
                                            <span id="routine_label_{{ $subjectId }}" class="routine-label"></span>
                                            <span class="edit-icon" id="edit_{{ $subjectId }}"></span>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Save Routine</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#select_class', function() {
                const selected_class = $(this).val();
                if (selected_class) {
                    const class_data = JSON.parse(selected_class);
                    $('#selected_class_name').text(class_data.name);
                    $('#selected_clas_id').val(class_data.id);
                } else {
                    $('#selected_class_name').text('');
                    $('#selected_clas_id').val('');
                }
            });
            $(document).on('change', '#routineForm .form-select', function() {
                var $subject = $(this).closest('td').find('select[name$="[subjects]"]');
                var $teacher = $(this).closest('td').find('select[name$="[teachers]"]');
                var $label = $(this).closest('td').find('span#routine_label_' + $subject.attr('id'));
                var $edit = $(this).closest('td').find('span#edit_' + $subject.attr('id'));
                if ($subject.val() && $teacher.val()) {
                    $subject.addClass('d-none');
                    $teacher.addClass('d-none');
                    $label.text($subject.val() + ' ( ' + $teacher.val() + ' )').removeClass('d-none');
                    $edit.removeClass('d-none').addClass('btn btn-warning inline btn-sm').append(
                        '<i class="fa fa-edit"></i>');
                }
                $edit.on('click', function() {
                    $subject.removeClass('d-none');
                    $teacher.removeClass('d-none');
                    $label.addClass('d-none');
                    $edit.addClass('d-none').html('');
                });
            });
        });
    </script>
@endSection
