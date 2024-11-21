@extends('app')

@section('content')

<h1>Edit Exam</h1>

<form action="{{route('exams.update',$exam->exam_id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <lable for="exam_name" class="form-lable">Exam Name</lable>
        <input type="text" name="exam_name" id="exam_name" class="form-control" value="{{old('exam_name',$exam->exam_name)}}" required>
    </div>

    <div class="mb-3">
        <lable for="exam_date" class="form-lable">Exam Date</lable>
        <input type="text" name="exam_date" id="exam_date" class="form-control" value="{{old('exam_date',$exam->exam_date)}}" required>
    </div>

    
    <button type="submit" class="btn btn-success">Save</button>



</form>

@endsection