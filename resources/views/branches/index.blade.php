@extends('app')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Branches</h1>
    <a href="{{ route('branches.create') }}" class="btn btn-primary">Add New Branch</a>
</div>

<table class="table table-boardered">
    <thead>
        <tr>
            <td>$</td>
            <td>Branch Name</td>
            <td>Address</td>
            <td>Institute</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    
        @foreach ($branches as $branch)
            <tr>
                <td>{{$branch->branch_id}}</td>
                <td>{{$branch->branch_name}}</td>
                <td>{{$branch->address}}</td>
                <td>{{$branch->institute->inst_name}}</td>

                <td>

                    <a href="{{ route('branches.edit', $branch->branch_id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('branches.destroy', $branch->branch_id) }}" method="POST" style="display: inline-black;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    
                </td>

            </tr>
        @endforeach
    </tbody>
</table>


@endsection