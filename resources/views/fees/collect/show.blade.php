@extends('layouts.adminapp', ['title' => 'Admin Fees Collect'])

@section('content')
    <h3>Fees Collect Show</h3>
    <form action="{{ route('feecollect.store')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <label for="firstName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name" value="{{ $student->first_name }} {{ $student->last_name }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" value="{{ $student->id }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="admissionNo" class="form-label">Admission No</label>
                <input type="text" class="form-control" id="admission_no" value="{{ $student->admission_no }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="rollNo" class="form-label">Class Roll</label>
                <input type="text" class="form-control" id="class_roll" value="{{ $student->roll_no }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" value="{{ date('d-m-Y') }}" disabled>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>fees_group</th>
                            <th>fees_type</th>
                            <th>duedate</th>
                            <th>amount</th>
                            <th>Collect<input type="checkbox" id="checkAll" class="form-check-input"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fessassigned as $fees)
                            <tr>
                                <td>{{ $fees->feesmaster->feesgroup->name }}</td>
                                <td>{{ $fees->feesmaster->feestype->name }}</td>
                                <td>{{ $fees->feesmaster->duedate }}</td>
                                <td>{{ $fees->feesmaster->amount }}</td>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="collect[]" value="[{{ $fees->id }}]">
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No fees found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <label for="payment_type" class="form-label">Payment Type</label>
                <input type="text" class="form-control" id="payment_type" name="payment_type" value="Cash" required>
            </div>
            <div class="col-12">
                <label for="trxid" class="form-label">Trx Id</label>
                <input type="text" class="form-control" id="trxid" name="trxid" placeholder="Trx Id" required>
            </div>
            <div class="col-12">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required>
            </div>
            <div class="col-12">
                <label for="note" class="form-label">Note</label>
                <input type="text" class="form-control" id="note" name="note" placeholder="Note">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Collect</button>
    </form>
@endsection

