@extends('app')

@section('content') 

    <div class="d-flex justify-content-between align-items-center">
        <h1>Courses</h1>
        <a href="{{route('courses.create')}}" class="btn btn-primary">Add New Course</a>
    </div>

    <table class="table table-boardered mt-3">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{$course->course_name}}</td>
                <td>{{$course->duration}}</td>

                <td>
                <a href="{{route('courses.edit',$course->course_id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('courses.destroy',$course->course_id)}}" method="POST">
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