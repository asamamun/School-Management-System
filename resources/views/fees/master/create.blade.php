@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
<form action="{{ route('feemaster.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="fees_group_id" class="form-label">Fees Group</label>
        <select class="form-select" id="fees_group_id" name="fees_group_id">
            <option value="-1">Select Fees Group</option>
            @foreach ($feesgroups as $feesgroup)
                <option value="{{ $feesgroup->id }}">{{ $feesgroup->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="fees_type_id" class="form-label">Fees Type</label>
        <select class="form-select" id="fees_type_id" name="fees_type_id">
            <option value="-1">Select Fees Type</option>
            @foreach ($feestypes as $feestype)
                <option value="{{ $feestype->id }}">{{ $feestype->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="duedate" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="duedate" name="duedate">
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount">
    </div>
    <div class="mb-3">
        <label for="fine_type" class="form-label">Fine Type</label>
        <select class="form-select" id="fine_type" name="fine_type">
            <option value="percentage">Percentage</option>
            <option value="amount">Amount</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="fine_amount" class="form-label">Fine Amount</label>
        <input type="number" class="form-control" id="fine_amount" name="fine_amount">
    </div>
    <div class="mb-3">
        <label for="fine_percentage" class="form-label">Fine Percentage</label>
        <input type="number" class="form-control" id="fine_percentage" name="fine_percentage">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection