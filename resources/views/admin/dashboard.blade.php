@extends('layouts.adminapp', ['title' => 'Admin'])
@section('content')
    <div class="container">
        @isset($admissionRequest)
            <div class="row">
                <div class="col-2">
                    <div
                        class="row g-0 border bg-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-100 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success text-primary-emphasis">Admision Apply</strong>
                            <h3 class="mb-0">{{ $admissionRequest }}</h3>
                            <div class="mb-1 text-body-secondary"> <strong>Student</strong></div>
                            <a href="{{ url('students') }}"
                                class="icon-link nav-link text-info gap-1 icon-link-hover stretched-link">
                                Show list...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection
