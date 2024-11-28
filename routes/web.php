<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ExamStudentController;
use App\Http\Controllers\ExamSubjectController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('institutes', InstituteController::class);
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('branches',BranchController::class);
Route::resource('exams',ExamController::class);

    Route::prefix('exams/{examId}/students')->group(function () {
        Route::get('/',[ExamStudentController::class,'index'])->name('exam_students.index');
        Route::post('/add',[ExamStudentController::class,'addStudent'])->name('exam_students.add');
        Route::delete('/remove/{studentId}',[ExamStudentController::class,'removeStudent'])->name('exam_students.remove');
    });

Route::get('/exams/{examId}/subjects', [ExamSubjectController::class, 'index'])->name('exam_subjects.index');
Route::post('/exams/{examId}/subjects', [ExamSubjectController::class, 'addSubject'])->name('exam_subjects.add');
Route::delete('/exams/{examId}/subjects/{subjectId}', [ExamSubjectController::class, 'removeSubject'])->name('exam_subjects.remove');
Route::get('/exams/results', [ExamResultController::class, 'selectExam'])->name('exam_results.select');
Route::get('/exams/{examId}/results', [ExamResultController::class, 'index'])->name('exam_results.index');
Route::post('/exams/{examId}/results', [ExamResultController::class, 'store'])->name('exam_results.store');