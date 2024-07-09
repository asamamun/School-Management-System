@extends('layouts.adminapp', ['title' => 'Admin | Fee assign'])

@section('content')
    <div>
        <h1>Fees Assign</h1>
    </div>
    <div class="">
        <div class="d-flex justify-content-center">
            <a href="{{ route('feeassign.create') }}" class="btn btn-sm btn-outline-secondary w-100"><i
                    class="fa fa-plus"></i>Assign Now</a>
        </div>
        <div class="table-responsive p-3">
            <table class="table table-sm table-success table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Class (Section)</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($feesassigns)}} --}}
                    @foreach ($feesassigns as $feesassign)
                        <tr>
                            <td>{{ $feesassign->student->first_name ?? '' }} {{ $feesassign->student->last_name ?? '' }}
                            </td>
                            <td>{{ $feesassign->standard->name ?? '' }}({{ $feesassign->standard->section->name ?? '' }})
                            </td>
                            <td
                                class="{{ $feesassign->status == 'paid' ? 'border border-5 border-success' : 'border border-5 border-warning' }}">
                                {{ $feesassign->status ?? '' }}</td>
                            <td>
                                @if ($feesassign->status == 'paid')
                                    <a href="{{ route('feecollect.show', $feesassign) }}" title="View"><i
                                            class="fa fa-eye"></i></a>
                                @else
                                    {{-- <a href="{{ route('feecollect.create', $feesassign) }}" title="Collect"><i class="fa fa-money"></i>Collect</a> --}}
                                    {{-- <a href="{{ route('feecollect.create', $feesassign) }}" title="Collect" class="btn btn-info"><i class="fa fa-money"></i> Collect</a> --}}
                                @endif
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $feesassigns->links() }}
        </div>
    </div>
@endsection
@section('script')
@endsection
