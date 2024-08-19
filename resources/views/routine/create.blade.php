@extends('layouts.adminapp', ['title' => 'Admin | Routine assign | Create'])

@section('content')
    <div class="container">
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
                        <select name="select_class" id="select_class" class="form-select" required>
                            <option value="">Select a class</option>
                            @foreach ($standards as $standard)
                                <option
                                    value="{{ old('select_class', json_encode(['id' => $standard->id, 'name' => $standard->name])) }}">
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
                                                id="{{ $subjectId }}" class="form-select form-select-sm mb-2" required>
                                                <option value="">Select</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject }}"
                                                        {{ old("schedule.$day.$time.subjects", '') == $subject ? 'selected' : '' }}>
                                                        {{ $subject }}</option>
                                                @endforeach
                                            </select>
                                            <select name="schedule[{{ $day }}][{{ $time }}][teachers]"
                                                id="{{ $teacherId }}" class="form-select form-select-sm" required>
                                                <option value="">Select</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher }}"
                                                        {{ old("schedule.$day.$time.teachers", '') == $teacher ? 'selected' : '' }}>
                                                        {{ $teacher }}</option>
                                                @endforeach
                                            </select>
                                            <span id="routine_label_{{ $subjectId }}" class="routine-label"></span>
                                            <span class="edit-icon"  id="edit_{{ $subjectId }}"></span>
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
            $('#select_class').change(function() {
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
            $(document).on('change', '#routineForm .form-select',
                function() {
                    var selectedSubject = $(this).closest('td').find('select[name$="[subjects]"]');
                    var selectedTeacher = $(this).closest('td').find('select[name$="[teachers]"]');
                    var label = $(this).closest('td').find('span#routine_label_'+selectedSubject.attr('id'));
                    var edit = $(this).closest('td').find('span#edit_'+selectedSubject.attr('id'));
                    console.log(edit.attr('id'));
                    console.log(selectedSubject.attr('id'));
                    var subjectId = selectedSubject.attr('id');
                    var teacherId = selectedTeacher.attr('id');

                    if(selectedSubject.val() && selectedTeacher.val()) {
                        selectedSubject.addClass('d-none');
                        selectedTeacher.addClass('d-none');
                        label.text(selectedSubject.val() + ' ( ' + selectedTeacher.val()+' )');
                        label.removeClass('d-none');
                        edit.removeClass('d-none');
                        edit.addClass('btn btn-warning inline btn-sm');
                        edit.append('<i class="fa fa-edit"></i>');
                    }
                    edit.on('click', function() {
                        selectedSubject.removeClass('d-none');
                        selectedTeacher.removeClass('d-none');
                        label.addClass('d-none');
                        edit.addClass('d-none');
                        edit.html('');
                    })

            });
        });
    </script>
@endSection
