@extends('layouts.adminapp', ['title' => 'Admin | Mark'])

@section('head')
@endsection

@section('content')
<p>mark index</p>

<div class="container mt-3">
    <form action="" method="post" class="">
        @csrf
        {{-- go to standard  --}}
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <label for="Session" class="input-group-text">Session</label>
                    <select name="session" id="session" class="form-control">
                        <option value="">Select...</option>
                        @foreach ($sessions as $session)
                            <option value="{{ $session }}">{{ $session }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label for="shift_id" class="input-group-text">Shift</label>
                    <select name="shift" id="shift_id" class="form-control">
                        <option value="-1">Select...</option>
                       
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label for="standard_id" class="input-group-text">Class</label>
                    <select name="standard" id="standard_id" class="form-control">
                        <option value="-1">Select...</option>
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
        <hr>
        <a href="{{ route('mark.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Create</a>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Shift</th>
                            <th>Session</th>
                            <th>Subject</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="studentList">
                        
                    </tbody>
                </table>
            </div>
        </div>  
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
          // get Shift
          $('#session').change(function() {
                let session = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('mark.getShift') }}",
                    data: {
                        session: session
                    },
                    success: function(data) {
                        let html = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            // console.log(key);
                            html += '<option value="' + key + '">' + value +
                                '</option>';
                        });
                        $('#shift_id').html(html);
                    }
                });
            });
            // get Standard
            $("#shift_id").change(function() {
                let id = $(this).val();
                let session = $("#session").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('mark.getStandard') }}",
                    data: {
                        shift_id: id,
                        session: session,
                    },
                    success: function(data) {
                        let html = '<option value="-1">Select...</option>';
                        $.each(data, function(key, value) {
                            console.log(value.id);
                            html += '<option value="' + value.id + '">' + value.name +
                                '(' +
                                value.section.name + ')'
                            '</option>';
                        });
                        $("#standard_id").html(html);
                    }
                });
            });
    });
</script>
@endsection
