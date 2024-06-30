@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
<form action="{{ route('feemaster.update', $feesMaster) }}" method="POST">
    @csrf
    @method('PATCH')
    {{-- <div class="mb-3">
        <label for="fees_group_id" class="form-label">Fees Group</label>
        <select class="form-select" id="fees_group_id" name="fees_group_id">
            <option value="">Select Fees Group</option>
            @foreach ($feesgroups as $feesgroup)
                <option value="{{ $feesgroup->id }}" {{ ($feesgroup->id == $feesMaster->fees_group_id) ? 'selected' : '' }}>{{ $feesgroup->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="fees_type_id" class="form-label">Fees Type</label>
        <select class="form-select" id="fees_type_id" name="fees_type_id">
            <option value="">Select Fees Type</option>
            @foreach ($feestypes as $feestype)
                <option value="{{ $feestype->id }}" {{ ($feestype->id == $feesMaster->fees_type_id) ? 'selected' : '' }}>{{ $feestype->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="duedate" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="duedate" name="duedate" value="{{ $feesMaster->duedate }}">
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{{ $feesMaster->amount }}">
    </div>
    <div class="mb-3">
        <label for="fine_type" class="form-label">Fine Type</label>
        <select class="form-select" id="fine_type" name="fine_type">
            <option value="">Select Fine Type</option>
            <option value="percentage" {{ ($feesMaster->fine_type == 'percentage') ? 'selected' : '' }}>Percentage</option>
            <option value="amount" {{ ($feesMaster->fine_type == 'amount') ? 'selected' : '' }}>Amount</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="fine_amount" class="form-label">Fine Amount</label>
        <input type="number" class="form-control" id="fine_amount" name="fine_amount" value="{{ $feesMaster->fine_amount }}">
    </div>
    <div class="mb-3">
        <label for="fine_percentage" class="form-label">Fine Percentage</label>
        <input type="number" class="form-control" id="fine_percentage" name="fine_percentage" value="{{ $feesMaster->fine_percentage }}">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="">Select Status</option>
            <option value="active" {{ ($feesMaster->status == 'active') ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ ($feesMaster->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
        </select>
    </div> --}}
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
