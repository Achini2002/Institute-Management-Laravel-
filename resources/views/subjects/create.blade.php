@extends('app')

@section('content')
  
    <div class="d-flex justify-content-between align-items-center">
        <h1>Subjects</h1>
        <a href="{{route('subjects.create')}}" class="btn btn-primary">Add New Subject</a>
    </div>

    <form action="{{route('subjects.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <lable for="sub_name" class="form-lable">Subject Name</lable>
            <input type="text" name="sub_name" id="sub_name" class="form-control" value="{{old('sub_name')}}" required>
        </div>

        <div class="mb-3">
            <lable for="credit_hours" class="form-lable">Credit Hours</lable>
            <input type="text" name="credit_hours" id="credit_hours" class="form-control" value="{{old('credit_hours')}}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>



    </form>



@endsection