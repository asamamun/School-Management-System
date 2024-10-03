@extends('layouts.main', ['title' => 'Admission'])

@section('content')
    <div class="container border border-2">
        <h1 class="text-center border border-1 m-3">Admission Information</h1>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $student->image) }}" class="img-fluid img-thumbnail" alt="...">
                    <div class="position-absolute top-0 end-0">
                        <span class="badge rounded-pill bg-secondary">{{ $student->admission_no }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row border rounded border-3 p-1">
                    <h4 class="text-center border-bottom border-2">Student Information</h4>
                    <div class="d-flex justify-content-between">
                        <strong>{{ $student->standard->name }}</strong>
                        <strong>Shift : {{ ucFirst($student->shift->name) }}</strong>
                        <strong>Session : {{ $student->standard->session }}</strong>
                        <strong>Admission No : {{ $student->admission_no }}</strong>
                        <strong>Admission Date : {{ $student->admission_date }}</strong>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName" readonly
                            value="{{ $student->first_name }} {{ $student->last_name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAdmissionNo" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="inputAdmissionNo" readonly
                            value="{{ $student->gender }}">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" readonly value="{{ $student->email }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputMobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="inputMobile" readonly
                            value="{{ $student->mobile }}">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="inputAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="inputAddress" rows="3" readonly>{{ $student->address }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Nationality</label>
                        <textarea class="form-control" id="inputAddress" rows="3" readonly>{{ $student->nationality }}</textarea>
                    </div>
                </div>
                <div class="border border-2">
                    <div
                        class="row g-0 border bg-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-100 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="justify-content-beetwin">
                                <strong class="mb-2 text-primary-emphasis">Admission Status: </strong>
                                <strong class="rounded"> {{ ucfirst($student->admission_status) }}</strong>
                            </div>
                            <div class="">

                                @isset($fees_master->feesAssigns)
                                    <p><strong>{{ ucfirst($fees_master->feesType->name) }} Fee:
                                            {{ $fees_master->amount }}</strong></p>

                                    @if ($fees_master->feesAssigns->isNotEmpty())
                                        @foreach ($fees_master->feesAssigns as $feesAssign)
                                            <p>Fee Status: <strong
                                                    class="{{ $feesAssign->status == 'unpaid' ? 'bg-warning' : 'bg-success' }}">{{ ucFirst($feesAssign->status) }}</strong>
                                            </p>
                                        @endforeach
                                    @else
                                        <p>No fee assignments found.</p>
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
