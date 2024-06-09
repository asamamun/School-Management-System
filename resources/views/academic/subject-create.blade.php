@extends('layouts.adminapp', [ 'title' => 'Admin'])
@section('content')
<div class="row">
    <div class="form-group col-10">
        <p>Subject Create</p>
    </div>
    <div class="form-group col-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
            <i class="fas fa-chevron-left mr-1"></i>
            Back
        </a>
    </div>
</div>
{{-- {{ dd($versions)}} --}}
    <form action="{{ route('subject.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" id="code" name="code" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type" class="form-control">
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="version">Version</label>
            <select id="version" name="version" class="form-control">
                @foreach($versions as $version)
                    <option value="{{ $version }}">{{ ucfirst($version) }}</option>
                @endforeach
            </select>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
