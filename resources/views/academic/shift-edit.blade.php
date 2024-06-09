@extends('layouts.adminapp', ['title' => 'Admin'])
@section('content')
    <p>shift Edit</p>
    {{ html()->modelForm($shift, 'PUT', route('shift.update', $shift))->open() }}

    @include('academic.shift-form')

    <div class="form-group">
        {{ html()->submit('Submit')->class('btn btn-primary') }}
    </div>

    {{ html()->closeModelForm() }}
@endsection
