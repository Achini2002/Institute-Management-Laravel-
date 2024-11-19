<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view("students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' =>'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'dob' => 'required|date',
            'gender'=> 'required|in:Male,Female,Other',
            'contact_number'=> 'required|string|max:15',
            'email'=> 'required|unique:students,email',
            'address'=> 'required|string',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' =>'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'dob' => 'required|date',
            'gender'=> 'required|in:Male,Female,Other',
            'Contact_number'=> 'required|string|max:15',
            'email'=> 'required|unique:students,email'.$student->stu_id,
            'address'=> 'required|string',

        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success','Students updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}
