<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('dashboard.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $department = new Department();

        $department->name = $request->name;
        $department->email = $request->email;
        $department->number = $request->number;
        $department->total_credit = $request->total_credit;
        $department->department_head = $request->department_head;

        $department->save();
    }


    public function edit($id)
    {
        $department = Department::find($id);

        return view('dashboard.departments.edit', compact('department'));
    }

    public function update(Request $request)
    {
        $department = Department::find($request->id);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'number' => 'numeric',
            'total_credit' => 'numeric',
            'department_head' => 'string',
        ]);

        $department->update($validatedData);

        return redirect(route('departments.index'));
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect(route('departments.index'));
    }
}
