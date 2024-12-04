@extends('app')

@section('content')
<div class="container mt-5">
    <h2>Exams</h2>
    <a href="{{ route('exams.create') }}" class="btn btn-primary mb-3">Add New Exam</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($exams as $exam)
                <tr>
                    <td>{{ $exam->exam_id }}</td>
                    <td>{{ $exam->exam_name }}</td>
                    <td>{{ $exam->exam_date }}</td>
                    <td>
                        <a href="{{ route('exams.edit', $exam->exam_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('exams.destroy', $exam->exam_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                        <a href="{{ route('exam_students.index', $exam->exam_id) }}" class="btn btn-sm btn-info">Manage
                            Students</a>

                        <a href="{{ route('exam_subjects.index', $exam->exam_id) }}" class="btn btn-info btn-sm">Manage
                            Subjects</a>

                        <a href="{{ route('exam_results.index', $exam->exam_id) }}" class="btn btn-success btn-sm">Manage
                            Results</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No exams found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

   
</div>
@endsection