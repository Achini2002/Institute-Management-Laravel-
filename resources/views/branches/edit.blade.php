@extends('app')

@section('content')

    <div class="d-flex justify-content-between align-items-center"></div>
        <h1>Edit Branch</h1>
    </div>

    <form action="{{route('branches.update',$branch->branch_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <lable for="branch_name" class="form-lable">Branch Name</lable>
            <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{old('branch_name',$branch->branch_name)}}" required>
        </div>

        <div class="mb-3">
            <lable for="address" class="form-lable">Address</lable>
            <input type="text" name="address" id="address" class="form-control" value="{{old('address',$branch->address)}}" required>
        </div>

        <div class="mb-3">
            <lable for="institute_inst_id" class="form-lable">Institute</lable>
            <select name="institute_inst_id" id="institute_inst_id" class="form-control" required>
                <option value="">Select a Institute</option>

                @foreach ($institutes as $institute)
                    <option value="{{$institute->inst_id}}{{old('institute_inst_id',$branch->institute_inst_id)==$institute->inst_id ? 'selected' : ''}}">
                        {{$institute->inst_name}}
                    </option>
                @endforeach
                    
                

            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>



    </form>

@endsection