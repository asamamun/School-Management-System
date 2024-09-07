@extends('layouts.adminapp', ['title' => 'Admin | Routine Time'])

@section('content')
    <div>
        <div>
            <h1>Routine Table</h1>
        </div>
        <div class="row">
            <div class="col-6 p-3">
                <form action="{{ route('routinestime.store') }}" method="POST" class="border border-2 p-2">
                    @csrf
                    <div class="text-center mb-3">
                        <h3>
                            Routine Assign
                        </h3>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label for="starting_time" class="input-group-text">Starting Time</label>
                            <input type="time" id="starting_time" name="starting_time" value="09:00"
                                class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label for="duration" class="input-group-text">Duration (minutes)</label>
                            <input type="number" id="duration" name="duration" class="form-control"
                                placeholder="Enter duration in minutes (Default min is 60)">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label for="total_class" class="input-group-text">Total Classes</label>
                            <input type="number" id="total_class" name="total_class" class="form-control"
                                placeholder="Enter total number of classes (Default Total Classes is 7)">
                        </div>
                    </div>

                    {{-- chekbox --}}
                    {{-- <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="if_break"
                                name
                            ="if_break">
                            <label class="form-check-label" for="if_break">If you want to set Break </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <div class="border border-4 pb-2 rounded text-center bg-info-subtle">
                                <label for="after_class" class="Form-label m-2">Break Time After Class (Count)</label>
                                <input type="number" id="after_class" name="after_class" class="form-control"
                                    placeholder="Enter Class number">
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <div class="border border-4 pb-2 rounded text-center bg-info-subtle">
                                <label for="break_duration" class="Form-label m-2">Break Duration (minutes)</label>
                                <input type="number" id="break_duration" name="break_duration" class="form-control"
                                    placeholder="Enter break time in minutes">
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

            <div class="col-6 p-3">
                <div class="border border-2 p-2">
                    <div class="text-center mb-3">
                        <h3>
                            Routine Table
                        </h3>
                    </div>

                    <table class="table table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Time Range</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $time_slot)
                                <tr>
                                    <td>{{ $time_slot->time_range }}</td>
                                    <td>{{ $time_slot->start_time }}</td>
                                    <td>{{ $time_slot->end_time }}</td>
                                    <td>{{ $time_slot->total_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script></script>
@endSection
