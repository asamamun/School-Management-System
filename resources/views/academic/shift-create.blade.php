@extends('layouts.adminapp', ['title' => 'Admin'])
@section('content')
    <p>shift create</p>
    {{ html()->form()->route('shift.store')->open() }}

    @include('academic.shift-form')

    {{ html()->submit('Submit')->class('btn btn-primary') }}
    {{ html()->form()->close() }}

@endsection
