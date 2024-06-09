@extends('layouts.adminapp', ['title' => 'Admin | Section'])
@section('content')
    <p>section create</p>
    <a href="{{ route('section.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-chevron-left mr-1"></i>
        Back
    </a>
    {{ html()->a()}}
    {{ html()->form()->route('section.store')->open() }}

    @include('academic.section-form')

    {{ html()->submit('Submit')->class('btn btn-primary') }}
    {{ html()->form()->close() }}

@endsection
