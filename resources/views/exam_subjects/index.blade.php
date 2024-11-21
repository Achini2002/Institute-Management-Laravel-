@extends('app')

@section('content')
<div class="container">
    <h3>Manage Subjects for Exam: {{ $exam->exam_name }}</h3>

    <!-- Add Subjects -->
    <h1>Add Subject to Exam</h1>
    <form action="{{ route('exam_subjects.add', $exam->exam_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject_id">Select Subject:</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach($availableSubjects as $subject)
                    <option value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Subject</button>
    </form>

    <!-- Assigned Subjects -->
    <h3 class="mt-5">Assigned Subjects</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assignedSubjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject->subject_name }}</td>
                    <td>
                        <form
                            action="{{ route('exam_subjects.remove', ['examId' => $exam->exam_id, 'subjectId' => $subject->subject_id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No subjects assigned to this exam.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection