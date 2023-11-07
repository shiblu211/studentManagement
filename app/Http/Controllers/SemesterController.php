<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return view('dashboard.semesters.index', compact('semesters'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'year' => 'required',
        ]);

        Semester::create($data);

        return redirect()->route('semesters.index')->with('success', 'Semester created successfully');
    }

    public function edit($id)
    {
        $semester = Semester::find($id);
        return view('dashboard.semesters.edit', compact('semester'));
    }

    public function update(Request $request)
    {
        $semester = Semester::find($request->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'year' => 'required'
        ]);

        $semester->update($validatedData);

        return redirect()->route('semesters.index');
    }

    public function destroy($id)
    {
        $student = Semester::find($id);
        $student->delete();

        return redirect()->route('semesters.index');
    }
}
