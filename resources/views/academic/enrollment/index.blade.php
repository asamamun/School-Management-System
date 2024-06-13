@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <div class="container-fluid d-flex justify-content-between">
        <div>
            <p class="h-1">Enrollment index</p>

        </div>
        <div class="p-2">
            <a href="{{ route('enrollment.create') }}" class="btn btn-sm btn-outline-secondary"><i
                    class="fa fa-plus"></i>Create</a>
        </div>
    </div>
    <div class="container mt-3">
        <form action="" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="shift_id" class="input-group-text">Shift</label>
                        <select name="shift_id" id="shift_id" class="form-select">
                            <option value="-1">Select Shift</option>
                            @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="standard_id" class="input-group-text">Standards</label>
                        <select name="standard_id" id="standard_id" class="form-select">
                            <option value="-1">Select Standard</option>                            
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3 ">
                        <label for="section_id" class="input-group-text">Section</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <option value="-1">Select Section</option>                            
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <label for="search" class="input-group-text"><i class="fa fa-search"></i></label>
                        <button type="button" id="searchBtn" class="btn btn-primary">Search</button>
                    </div>
                </div>





            </div>
        </form>
    </div>
    {{--  --}}
    <div class="container">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Admission No</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#shift_id").change(function () {
                let id = $(this).val();
                console.log(id);
                $.get("{{ route('standatd.getStandardFromShift' ) }}", {
                    shift_id: id
                }, function (data) {
                    console.log(data);
                    let options = `<option value='-1'>Select Section</option>`;
                        for (const key in data) {
                            options += `<option value="${key}">${data[key]}</option>`;
                        }                        
                        $("#standard_id").html(options);

                })
            });



            $("#searchBtn").click(function () {
                alert("hello");
                var shift_id = $("#shift_id").val();
                var standard_id = $("#standard_id").val();
                var section_id = $("#section_id").val();
                // var url = "{{ route('enrollment.search') }}?shift_id=" + shift_id + "&standard_id=" + standard_id + "&section_id=" + section_id;
                // window.location.href = url;
                var data = {
                    shift_id: shift_id,
                    standard_id: standard_id,
                    section_id: section_id
                };
                // console.log(data);
                var URL = "{{ route('enrollment.search') }}";
                $.post(URL, data,
                    function (data, textStatus, jqXHR) {
                        console.log(data);
                        //for in loop
                        
                    },
                    "dataType"
                );
            });
        });
    </script>
@endsection