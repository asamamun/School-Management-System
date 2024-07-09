@extends('layouts.main', ['title' => 'Admission'])

@section('content')
    <div>
        <div>
            <div class="row mb-2 p-5">
                <div class="d-flex justify-content-center p-2 m-2 bg-success-subtle shadow-sm p-3 mb-5 rounded">
                    <h2>Online Admission System </h2>
                </div>
                <div class="col-md-3 border border-bottom-0 me-3">
                    <h4 class="text-center border-bottom">Admission Notice</h4>
                    <div
                        class="row g-0 border bg-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-100 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">Find Your Admission info..</strong>
                            <div class="">
                                <button class="btn con-link gap-1 icon-link-hover stretched-link" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Search by Admission/email...
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 row border border-bottom-0">
                    <h4 class="text-center border-bottom">Available Class</h4>

                    @forelse ($admissionClass as $classis)
                        <div class="col-md-6">
                            <div
                                class="row g-0 border bg-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-100 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary-emphasis">Apply Now...</strong>
                                    <h3 class="mb-0">{{ $classis->name }}</h3>
                                    <div class="mb-1 text-body-secondary">Session: {{ $classis->session }}</div>
                                    <p class="card-text mb-auto"></p>
                                    <a href="{{ route('admission.create', $classis) }}"
                                        class="icon-link gap-1 icon-link-hover stretched-link">
                                        Continue Admission now
                                        <svg class="bi">
                                            <use xlink:href="#chevron-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            {{--  --}}
            {{-- @if (session('feesMaster'))
                {{ dd(session('feesMaster'))}}

            @endif --}}
            {{--  --}}
            @if (session('student'))
                @php
                    $student = session('student');
                @endphp
                <div>
                    <h3>Student Information</h3>
                    <p><strong>Admission No:</strong> {{ $student->admission_no }}</p>
                    <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>
                    <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                    <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
                    <p><strong>Email:</strong> {{ $student->email }}</p>
                    <p><strong>Mobile:</strong> {{ $student->mobile }}</p>
                    <!-- Add more fields as needed -->
                </div>
            @endif
        </div>
    </div>
    <div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded-4">
                    <form action="{{ route('student-info') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 " id="staticBackdropLabel">Search by [Admission No, Email]</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body input-group input-group-lg rounded-3">
                            <input type="text" class="form-control" name="StudentInfo" value="{{ old('StudentInfo') }}"
                                placeholder="Admission NO/Email" aria-label="Admission NO/Email"
                                aria-describedby="basic-addon2">
                            <button type="submit" class="input-group-text bg-success-subtle border border-success"
                                id="basic-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
