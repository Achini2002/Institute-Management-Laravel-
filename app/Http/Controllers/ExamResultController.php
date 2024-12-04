<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index($examId)
    {
        $exam = Exam::with(['students', 'subjects'])->findOrFail($examId);

        // Retrieve students and subjects related to the exam
        $students = $exam->students;
        $subjects = $exam->subjects;

        // Retrieve results
        $results = Result::where('exam_exam_id', $examId)->get();

        return view('exam_results.index', compact('exam', 'students', 'subjects', 'results'));
    }

    public function store(Request $request, $examId)
    {
        $validated = $request->validate([
            'stu_id' => 'required|exists:students,stu_id',
            'sub_id' => 'required|exists:subjects,sub_id',
            'mark_obtained' => 'required|numeric|min:0',
        ]);

        // Automatically assign grade based on mark_obtained
        $mark = $validated['mark_obtained'];
        $grade = $this->calculateGrade($mark);

        $result = Result::updateOrCreate(
            [
                'exam_exam_id' => $examId,
                'stu_id' => $validated['stu_id'],
                'sub_id' => $validated['sub_id'],
            ],
            [
                'mark_obtained' => $mark,
                'grade' => $grade,
            ]
        );

        return redirect()
            ->route('exam_results.index', ['examId' => $examId])
            ->with('success', 'Result saved successfully!');
    }

    /**
     * Helper function to calculate grade based on marks.
     */
    private function calculateGrade($mark)
    {
        if ($mark < 35) {
            return 'Fail';
        } elseif ($mark >= 35 && $mark < 55) {
            return 'C';
        } elseif ($mark >= 55 && $mark < 65) {
            return 'B';
        } elseif ($mark >= 65 && $mark < 75) {
            return 'A';
        } else {
            return 'A+';
        }
    }
}