@extends('layouts.adminapp', [ 'title' => 'Admin'])
@section('content')
<div class="row">
    <div class="form-group col-10">
        <p>Subject Edit</p>
    </div>
    <div class="form-group col-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
            <i class="fas fa-chevron-left mr-1"></i>
            Back
        </a>
    </div>
</div>
@endsection