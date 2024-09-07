@extends('layouts.adminapp', ['title' => 'Admin | Routine assign'])

@section('content')
    <div>
        <h1>Routine</h1>
    </div>
    <div class="row">
        <div class="card shadow m-2 col">
            <a href="{{ route('routines.create') }}" class="btn btn-success m-3"><i class="fa fa-plus"></i>Create Routine</a>
        </div>
        <div class="card shadow m-2 col">
            <a href="{{ route('routines.time') }}" class="btn btn-success m-3"><i class="fa fa-clock"></i> Class Time</a>
        </div>
    </div>
    <div>
        <h3>Routine list</h3>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Class</th>
                    <th>Session</th>
                    <th>Section</th>
                    <th>Sheft</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($standards as $standard)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $standard->name }}</td>
                        <td>{{ $standard->session }}</td>
                        <td>{{ $standard->section->name }}</td>
                        <td>{{ $standard->shift->name }}</td>
                        <td>
                            @foreach ($standard->routines as $routine)
                                <a href="{{ route('routine.show', [$routine->id, $standard]) }}"
                                    class="btn btn-info btn-sm">{{ $loop->index + 1 }} Show</a>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
{{-- @section('script')
    <script>
        
    </script>
@endSection --}}
