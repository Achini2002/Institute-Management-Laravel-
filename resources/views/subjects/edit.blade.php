@extends('app')

@section('content')

<h1>Edit Course</h1>

    <form action="{{route('subjects.update',$subject->sub_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <lable for="sub_name" class="form-lable">Subject Name</lable>
            <input type="text" name="sub_name" id="sub_name" class="form-control" value="{{old('sub_name',$subject->sub_name)}}" required>
        </div>

        <div class="mb-3">
            <lable for="credit_hours" class="form-lable">Credit Hours</lable>
            <input type="text" name="credit_hours" id="credit_hours" class="form-control" value="{{old('credit_hours',$subject->credit_hours)}}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>



    </form>

@endsection