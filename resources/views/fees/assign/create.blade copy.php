@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
    <p>create</p>
    {{-- get session, shift, class, section use conteoller --}}
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fees Name</th>
                        <th>Type</th>
                        <th>Duedate</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feesmasters as $feesmaster)
                        <tr class="selectable">
                            <td >{{ $feesmaster->FeesGroup->name }}</td>
                            <td>{{ $feesmaster->FeesType->name }}</td>
                            <td>{{ $feesmaster->duedate }}</td>
                            <td>{{ $feesmaster->amount }}</td>
                            <td><button class="btn btn-danger btn-sm remove-btn">Remove</button></td>
                        </tr>
                    @endforeach

                </tbody>
                {{-- <tbody>
                    <tr><td class="selectable">Item 1</td></tr>
                    <tr><td class="selectable">Item 2</td></tr>
                    <tr><td class="selectable">Item 3</td></tr>
                    <tr><td class="selectable">Item 4</td></tr>
                    <tr><td class="selectable">Item 5</td></tr>
                </tbody> --}}
            </table>
        </div>
        <div class="col">
            <div id="selected-item" class="border p-3">
                <h5>Selected Item:</h5>
                <p id="item-display">No data selected</p>
            </div>
        </div>
    </div>
    {{-- {{ dd($feesmasters)}} --}}
    <form action="{{ route('feeassign.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
             // Handle selection of item
             $(".selectable").click(function() {
                var selectedItem = $(this).text();
                $("#item-display").text(selectedItem);
            });
            // Handle removal of item
            $(".remove-btn").click(function() {
                   $(this).closest("tr").remove();
               });
        });

    </script>
@endsection
