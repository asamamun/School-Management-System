@extends('layouts.adminapp', ['title' => 'Admin'])

@section('content')
<p>index</p>

<a href="{{ route('feemaster.create') }}" class="btn btn-sm btn-outline-secondary">create</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>fees_group</th>
            <th>fees_type</th>
            <th>duedate</th>
            <th>amount</th>
            <th>fine_type</th>
            <th>fine_amount</th>
            <th>fine_percentage</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($feesmasters as $feemaster)
            {{-- {{ dd($feemaster) }} --}}
            <tr>
                <td>{{ $feemaster->id }}</td>
                <td>{{ $feemaster->feesGroup->name }}</td>
                <td>{{ $feemaster->feesType->name }}</td>
                <td>{{ $feemaster->duedate }}</td>
                <td>{{ $feemaster->amount }}</td>
                <td>{{ $feemaster->fine_type }}</td>
                <td>{{ $feemaster->fine_amount }}</td>
                <td>{{ $feemaster->fine_percentage }}</td>
                <td>{{ $feemaster->status }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('feemaster.edit', $feemaster->id) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                       {{-- show --}}
                       <a href="{{ route('feemaster.show', $feemaster) }}" class="btn btn-sm btn-outline-secondary" target="_blank"> <i class="fa fa-eye"></i></a>
                        <form action="{{ route('feemaster.destroy', $feemaster) }}" method="post" onsubmit="return confirmDelete(event, this)">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@push('scripts')
    <script>
        function confirmDelete(event, form) {
            event.preventDefault();
            const message = "Are you sure you want to delete this record?";
            if (confirm(message)) {
                form.submit();
            }
        }
    </script>
@endpush
