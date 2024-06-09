@extends('layouts.adminapp', ['title' => 'Admin'])
@section('content')
    <p>section Edit</p>
    {{ html()->modelForm($section, 'PUT', route('section.update', $section))->open() }}

    @include('academic.section-form')

    <div class="form-group">
        {{ html()->submit('Submit')->class('btn btn-primary') }}
    </div>

    {{ html()->closeModelForm() }}
@endsection
