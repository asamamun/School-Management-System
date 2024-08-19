@extends('layouts.adminapp', ['title' => 'Admin | Routine assign'])

@section('content')
    <div>
        <h1>Routine</h1>
    </div>
    <div>
        <a href="{{ route('routines.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i>Create Routine</a>
    </div>
@endsection
{{-- @section('script')
    <script>
        
    </script>
@endSection --}}
