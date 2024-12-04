@extends('app')

@section('content')
<div class="container mt-5">
    <h2>Manage Results for Exam: {{ $exam->exam_name }}</h2>

    <form action="{{ route('exam_results.store', $exam->exam_id) }}" method="POST">
        @csrf

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    @foreach($subjects as $subject)
                        <th>{{ $subject->sub_name }}</th>
                        <th>Grade</th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                            <tr>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                @foreach($subjects as $subject)
                                                @php
                                                    $result = $results->firstWhere('stu_id', $student->stu_id)
                                                            ?->firstWhere('sub_id', $subject->sub_id);
                                                    $markObtained = $result->mark_obtained ?? '';
                                                    $grade = $result->grade ?? '-';
                                                @endphp
                                                <td>
                                                    <input type="number" name="mark_obtained" class="form-control mark-input" required min="0"
                                                        max="100" value="{{ $markObtained }}"
                                                        data-grade-target="#grade-{{ $student->stu_id }}-{{ $subject->sub_id }}"
                                                        placeholder="Enter marks">

                                                    <input type="hidden" name="stu_id" value="{{ $student->stu_id }}">
                                                    <input type="hidden" name="sub_id" value="{{ $subject->sub_id }}">
                                                </td>
                                                <td>
                                                    <span id="grade-{{ $student->stu_id }}-{{ $subject->sub_id }}"
                                                        class="grade-label">{{ $grade }}</span>
                                                </td>

                                @endforeach
                            </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success mt-3">Save Results</button>
    </form>
</div>

<script>
    // dynamically calculate grade based on marks
    document.querySelectorAll('.mark-input').forEach(input => {
        input.addEventListener('input', function () {
            const mark = parseInt(this.value, 10);
            const gradeTarget = document.querySelector(this.dataset.gradeTarget);

            let grade = '-';
            if (!isNaN(mark)) {
                if (mark < 35) {
                    grade = 'Fail';
                } else if (mark < 55) {
                    grade = 'C';
                } else if (mark < 65) {
                    grade = 'B';
                } else if (mark < 75) {
                    grade = 'A';
                } else {
                    grade = 'A+';
                }
            }

            gradeTarget.textContent = grade;
        });
    });
</script>
@endsection