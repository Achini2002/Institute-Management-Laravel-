<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($examId)
    {
        $exam = Exam::find($examId);

        $assignedSubjects = $exam->subjects;
        $availableSubjects = Subject::whereNotIn(
            'sub_id',
            $assignedSubjects->pluck('sub_id')
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

    public function addSubjects(Request $request,$examId){
        $validated = $request->validate([
            'subject_id'=> 'required|exists|subjects,sub_id',
        ]);

        $exam = Exam::find($examId);
        $exam->subjects()->attach($validated['student_id']);

        return redirect()->route('exam_subjects.index',$examId)->with('success','Subject added successfully');

    }

    public function removeStudent($examId,$subjectId){
        $exam = Exam::find($examId);
        $exam->subjects()->detach($subjectId);

        return redirect()->route('exam_subjects_index',$examId)->with('success', 'Subject removed successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
