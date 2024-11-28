<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($examId)
    {
        $exam = Exam::findOrFail($examId);
        $students = $exam->students;
        $subjects = $exam->subjects;

        //Fetch results for the current exam
        $results = Result::where('exam_exam_id',$examId)->get();

        return view('exam_results.index',compact('exam','students','subjects','results'));
    }

    
   

    
    public function store(Request $request,$examId)
    {
        $validated = $request->validate([
            'results'=> 'required|array',
            'results.*.'=> 'nullable|integer|min:0|max:100',// Marks between 0 and 100
        ]);

        foreach($validated['results'] as $studentId => $subjects) {
            foreach ($subjects as $subjectId => $marks){
                if ($marks !== null ) {
                    Result::updatedOrCreated(
                        [
                        'exam_exam_id' => $examId,
                        'stu_id'=> $studentId,
                        'sub_id'=> $subjectId,
                        ],

                        [
                            'mark_obtained' => $marks,
                        ]
                
                    );
                }
            }
        }

        return redirect()->route('exam_results.index', $examId)->with('success','Results saved successfully!');
    }

    
}
