@extends('app')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Branch</h1>
        <a href="{{route('branches.create')}}" class="btn btn-primary">Add New Branch</a>
    </div>

    <form action="{{route('branches.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <lable for="branch_name" class="form-lable">Branch Name</lable>
            <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{old('branch_name')}}" required>
        </div>

        <div class="mb-3">
            <lable for="address" class="form-lable">Address</lable>
            <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" required>
        </div>

        <div class="mb-3">
            <lable for="institute_inst_id" class="form-lable">Insrtitute</lable>
            <select name="institute_inst_id" id="institute_inst_id" class="form-control" value="{{old('institute_inst_id')}}" required>
                <option value="">Select a Institute</option>

                @foreach ($institutes as $institute)
                    <option value="{{$institute->inst_id}}">
                        {{$institute->inst_name}}
                    </option>
                @endforeach
                    
                

            </select>
        </div>



        <button type="submit" class="btn btn-success">Save</button>


    </form>


@endsection