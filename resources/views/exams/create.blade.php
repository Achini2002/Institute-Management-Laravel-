@extends('app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Exams</h1>
        <a href="{{route('exams.create')}}" class="btn btn-primary">Add New Exams</a>
    </div>

    <form action="{{route('exams.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <lable for="exam_name" class="form-lable">Exam Name</lable>
            <input type="text" name="exam_name" id="exam_name" class="form-control" value="{{old('exam_name')}}" required>
        </div>

        <div class="mb-3">
            <lable for="exam_date" class="form-lable">Exam Date</lable>
            <input type="date" name="exam_date" id="exam_date" class="form-control" value="{{old('exam_date')}}" required>
        </div>

        

        <button type="submit" class="btn btn-success">Save</button>


    </form>

@endsection