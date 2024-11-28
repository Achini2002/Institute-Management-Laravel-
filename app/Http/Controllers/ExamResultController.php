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
        $exam = Exam::with(['students','subjects'])->findOrFail($examId);
        $students = $exam->students;
        $subjects = $exam->subjects;

        //Fetch results for the current exam
        $results = Result::where('exam_exam_id',$examId)->get();

        return view('exam_results.index',compact('exam','students','subjects','results'));
    }

    
   

    
    public function store(Request $request,$examId)
    {
        $validated = $request->validate([
            'stu_id'=> 'required|exists:students,stu_id',
            'sub_id'=> 'required|exists:subjects,sub_id',
            'mark_obtained'=> 'required|numeric|min:0',
        ]);

        // automatically assign grade basedon mark_obtanied
        $mark = $validated['mark_obtanied'];
        $grade = $this->calculateGrade($mark);


        $result = Result::updateOrCreate([
            'exam_exam_id'=> $examId,
            'stu_id' => $validated['stu_id'],
            'sub_id'=> $validated['sub_id'],
        ],
        [
            'mark_obtained' => $mark,
            'grade'=> $grade,
        ]
    );

    return redirect()->route('exam_results.index', ['examId'=> $examId])->with('success','Result saved successfully');

    }

    private function calculateGrade($mark)
    {
            if($mark < 35){ 
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