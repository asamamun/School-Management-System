@extends('layouts.adminapp', ['title' => 'Admin Fees Collect'])

@section('content')
    <h3>Fees Collect Show</h3>
    <form action="{{ route('feecollect.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row m-3 p-2 pb-3 rounded border border-2">
            <div class="col-md-3">
                <label for="firstName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name"
                    value="{{ $student->first_name }} {{ $student->last_name }}" disabled>
            </div>
            <div class="col-md-2">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" value="{{ $student->id }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="admissionNo" class="form-label">Admission No</label>
                <input type="text" class="form-control" id="admission_no" value="{{ $student->admission_no }}" disabled>
            </div>
            <div class="col-md-2">
                <label for="rollNo" class="form-label">Class Roll</label>
                <input type="text" class="form-control" id="class_roll" value="{{ $student->roll_no }}" disabled>
            </div>
            <div class="col-md-2">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" value="{{ date('d-m-Y') }}" disabled>
            </div>
        </div>
        <div class="row m-3 p-2 pb-3 rounded border border-5">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fees Group</th>
                            <th>fees Type</th>
                            <th>Duedate</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Collect <input type="checkbox" id="checkAll" class="form-check-input"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fessassigned as $fees)
                            {{-- {{ dd($fees->status == 'unpaid') }} --}}
                            <tr>
                                <td>{{ $fees->feesmaster->feesgroup->name }}</td>
                                <td>{{ $fees->feesmaster->feestype->name }}</td>
                                <td>{{ $fees->feesmaster->duedate }}</td>
                                <td>{{ $fees->feesmaster->amount }}</td>
                                @if ($fees->status == 'unpaid')
                                    <td class="bg-warning"><strong>{{ $fees->status }}</strong></td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="collect[]"
                                            value="{{ $fees->id }}">
                                    </td>
                                @elseif ($fees->status == 'paid')
                                    <td class="bg-success"><strong>{{ $fees->status }}</strong></td>

                                    <td>
                                        <input type="checkbox" class="form-check-input" checked disabled>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No fees found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row border-top border-5">
                <div class="col ">
                    <label for="payment_type" class="form-label">Payment Type</label>
                    <input type="text" class="form-control" id="payment_type" name="payment_type" value="Cash"
                        required>
                </div>
                <div class="col">
                    <label for="trxid" class="form-label">Trx Id</label>
                    <input type="text" class="form-control" id="trxid" name="trxid" placeholder="Trx Id" required>
                </div>
                {{-- <div class="col">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required>
            </div> --}}
                <div class="col">
                    <label for="note" class="form-label">Note</label>
                    <input type="text" class="form-control" id="note" name="note" placeholder="Note">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between m-5">
            <a class="btn btn-secondary" href="{{ route('feecollect.index') }}">Back</a>
            <button class="btn btn-primary" type="submit">Collect</button>
        </div>
    </form>
@endsection
