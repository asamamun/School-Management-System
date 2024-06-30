@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
<form action="{{ route('feemaster.update', $feemaster) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="fees_group_id" class="form-label">Fees Group</label>
        <select class="form-select" id="fees_group_id" name="fees_group_id">
            <option value="">Select Fees Group</option>
            @foreach ($feesgroups as $id => $name)
                <option value="{{ $id }}" {{ ($id == $feemaster->fees_group_id) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="fees_type_id" class="form-label">Fees Type</label>
        <select class="form-select" id="fees_type_id" name="fees_type_id">
            <option value="">Select Fees Type</option>
            @foreach ($feestypes as $id => $name)
                <option value="{{ $id }}" {{ ($id == $feemaster->fees_type_id) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="duedate" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="duedate" name="duedate" value="{{ $feemaster->duedate }}">
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{{ $feemaster->amount }}">
    </div>
    <div class="mb-3">
        <label for="fine_type" class="form-label">Fine Type</label>
        <select class="form-select" id="fine_type" name="fine_type">
            <option value="">Select Fine Type</option>
            <option value="percentage" {{ ($feemaster->fine_type == 'percentage') ? 'selected' : '' }}>Percentage</option>
            <option value="amount" {{ ($feemaster->fine_type == 'amount') ? 'selected' : '' }}>Amount</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="fine_amount" class="form-label">Fine Amount</label>
        <input type="number" class="form-control" id="fine_amount" name="fine_amount" value="{{ $feemaster->fine_amount }}">
    </div>
    <div class="mb-3">
        <label for="fine_percentage" class="form-label">Fine Percentage</label>
        <input type="number" class="form-control" id="fine_percentage" name="fine_percentage" value="{{ $feemaster->fine_percentage }}">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="">Select Status</option>
            <option value="active" {{ ($feemaster->status == 'active') ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ ($feemaster->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
        </select>
    </div> 
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
