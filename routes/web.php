<?php

use App\Http\Controllers\CourseController;
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