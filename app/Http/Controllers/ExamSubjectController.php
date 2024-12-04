<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamSubjectController extends Controller
{
    public function index($examId)
    {
        $exam = Exam::find($examId);

        $assignedSubjects = $exam->subjects;
        $availableSubjects = Subject::whereNotIn(
            'sub_id',
            $assignedSubjects->pluck('subject_id')
        )->get();

        return view(
            'exam_subjects.index',
            compact(
                'exam',
                'assignedSubjects',
                'availableSubjects'
            )
        );

    }

    public function addSubject(Request $request, $examId)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,sub_id',
        ]);

        $exam = Exam::find($examId);
        $exam->subjects()->attach($validated['subject_id']);

        return redirect()->route(
            'exam_subjects.index',
            $examId
        )->with(
                'success',
                'Subject added successfully!'
            );
    }

    public function removeSubject($examId, $subjectId)
    {
        $exam = Exam::find($examId);
        $exam->subjects()->detach($subjectId);

        return redirect()->route('exam_subjects.index', $examId)
            ->with('success', 'Subject removed successfully');
    }


}
