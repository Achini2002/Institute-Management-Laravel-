@extends('app')

@section('content')

<h1>Edit Course</h1>

    <form action="{{route('courses.update',$course->course_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <lable for="course_name" class="form-lable">Course Name</lable>
            <input type="text" name="course_name" id="course_name" class="form-control" value="{{old('course_name',$course->course_name)}}" required>
        </div>

        <div class="mb-3">
            <lable for="duration" class="form-lable">Duration</lable>
            <input type="text" name="duration" id="duration" class="form-control" value="{{old('duration',$course->duration)}}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>



    </form>

@endsection