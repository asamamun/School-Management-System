@extends('layouts.adminapp', ['title' => 'Admin | Section'])
@section('content')
    <div class="row">
        <div class="form-group col-10">
            <p>section create</p>
        </div>
        <div class="form-group col-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
                <i class="fas fa-chevron-left mr-1"></i>
                Back
            </a>
        </div>
    </div>
    {{ html()->a() }}
    {{ html()->form()->route('section.store')->open() }}

    @include('academic.section-form')

    {{ html()->submit('Submit')->class('btn btn-primary') }}
    {{ html()->form()->close() }}
@endsection
