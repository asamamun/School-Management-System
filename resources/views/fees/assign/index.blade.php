@extends('layouts.adminapp', ['title' => 'Admin | Fee assign'])

@section('content')
<p>Fees Assign</p>
<div class="container">
<a href="{{ route('feeassign.create') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus"></i>Create</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feesassigns as $feesassign)
            <tr>
                <td>{{ $feesassign->student->name }}</td>
                <td>{{ $feesassign->status }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('feeassign.edit', $feesassign) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                        {{-- {{ route('section.show', $section) }} --}}
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-eye"></i>
                        </a>

                        <form action="{{ route('feeassign.destroy', $section) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
@section('script')
    
@endsection