<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('department:id,name','semester:id,name')->get();
        $departments = Department::select('id', 'name')->get();
        return view('dashboard.students.index', compact('students','departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'department_id' => 'required',
            'photo' => 'nullable',
            'guardian_number' => 'nullable',
            'semester_id' => 'nullable',
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $departments = Department::select('id', 'name')->get();
        $semesters = Semester::all();
        return view('dashboard.students.edit', compact('student','departments','semesters'));
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'department_id' => 'required',
            'photo' => 'nullable',
            'guardian_number' => 'nullable',
            'semester_id' => 'nullable',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
