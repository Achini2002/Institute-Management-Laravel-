@extends('app')

@section('content') 

    <div class="d-flex justify-content-between align-items-center">
        <h1>Courses</h1>
        <a href="{{route('courses.create')}}" class="btn btn-primary">Add New Courses</a>
    </div>

    <form action="{{route('courses.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <lable for="course_name" class="form-lable">Course Name</lable>
            <input type="text" name="course_name" id="course_name" class="form-control" value="{{old('course_name')}}" required>
        </div>

        <div class="mb-3">
            <lable for="duration" class="form-lable">Duration</lable>
            <input type="text" name="duration" id="duration" class="form-control" value="{{old('duration')}}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>


    </form>

@endsection