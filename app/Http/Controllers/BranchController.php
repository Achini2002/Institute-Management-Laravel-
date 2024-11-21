<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Institute;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('institute')->paginate(10);
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institutes = Institute::all(); 
        return view('branches.create',compact('institutes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_name' => 'required|string|max:45',
            'address' => 'nullable|string',
            'institute_inst_id' => 'required|exists:institutes,inst_id',
        ]);

        Branch::create($validated);

        return redirect()->route('branches.index')
            ->with('success', 'Branch created successfully!');
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
    public function edit(Branch $branch )
    {
        $institutes = Institute::all();
        return view('branches.edit',compact('branch','institutes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'branch_name' => 'required|string|max:45',
            'address' => 'nullable|string',
            'institute_id'=> 'required|exists:institutes.id',
        ]);

        $branch->update($validated);
        return redirect()->route('branches.index')->with('success','Branch updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success','Branch deleted successfully');
    }
}
