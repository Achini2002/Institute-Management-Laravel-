<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\exam_has_studet;
use App\Models\Student;
use Illuminate\Http\Request;
use Redirect;

class ExamStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($exam_id)
    {
        $exam  = Exam::find($exam_id);
        $assignedStudents = $exam->students;
        $avilableStudents = Student::whereNotIn('stu_id',$assignedStudents->pluck('stu_id'))->get();

        return view('exam_students.index', compact('exam','assignedStudents','avilableStudents'));
    }


    public function addStudent(Request $request, $examid)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,stu_id',
        ]);

        exam_has_studet::create([
            'exam_id' => $examid,
            'stu_id' => $validated['student_id'],
        ]);

        return redirect()->route(
            'exam_students.index',
            $examid
        )->with(
                'success',
                'Student added successfully!'
            );
    }



    public function removeStudent($examid, $studentId)
    {
        exam_has_studet::where('exam_id', $examid)->where('stu_id', $studentId)->delete();
        return redirect()->route('exam_students.index',$examid)->with('success','Student removed successfully');
    }
    
    
}
