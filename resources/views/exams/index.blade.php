@extends('app')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Exams</h1>
        <a href="{{route('exams.create')}}" class="btn btn-primary">Add New Exam</a>
    </div>

    <table class="table table-boardered mt-3">
        <thead>
            <tr>
                <th>Exam Name</th>
                <th>Exam Date</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{$exam->exam_name}}</td>
                <td>{{$exam->exam_date}}</td>
                

                <td>
                <a href="{{route('exams.edit',$exam->exam_id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('exams.destroy',$exam->exam_id)}}" method="POST">
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