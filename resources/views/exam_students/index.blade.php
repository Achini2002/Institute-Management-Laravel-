@extends('app')

@section('content')
<div class="container">
    <h1>Manage Students for Exam: {{ $exam->exam_name }}</h1>

    <!-- Add Students -->
    <h3>Add Student to Exam</h3>
    <form action="{{ route('exam_students.add', $exam->exam_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Select Student:</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach($avilableStudents as $student)
                    <option value="{{ $student->stu_id }}">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Student</button>
    </form>

    <!-- Assigned Students -->
    <h3 class="mt-5">Assigned Students</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assignedStudents as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>
                        <form
                            action="{{ route('exam_students.remove', ['examId' => $exam->exam_id, 'studentId' => $student->stu_id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No students assigned to this exam.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection