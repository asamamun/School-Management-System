@extends('layouts.main', ['title' => 'Home'])
@section('content')
    <div class="container-fluid">
        <div class="row mt-1">
            <img src="{{ asset('storage/image/main.png') }}" class="img-fluid" alt="Responsive image" width="100%" style="border-radius: 10px">
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <h3>What Is School Management System? <br> And Why Does It So Important?</h3>
                <p>
                    Schools of all levels and sizes face numerous challenges in organizing communications between administrators, teachers, students, and parents. Student information, payments, and other administrative tasks can be overwhelming, especially at medium and large educational institutions. School management systems can automate these tasks and reduce administrative and personnel requirements. </p>
            </div>
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card">
                        <img src="{{ asset('storage/image/aa.jpg') }}" class="card-img-top" alt="..." height="250" width="200">
                    </div>
                    <div class="card">
                        <img src="{{ asset('storage/image/bb.jpg') }}" class="card-img-top" alt="..." height="250" width="200">
                    </div>
                    <div class="card">
                        <img src="{{ asset('storage/image/ee.png') }}" class="card-img-top" alt="..." height="250" width="200">
                    </div>
                </div>
            </div>
        </div>
    @endsection
