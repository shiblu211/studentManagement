<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDepartments = Department::count();
        $totalStudents = Student::count();
        $departmentWiseStudentCount = Student::select('departments.name as department_name', DB::raw('count(students.id) as student_count'))
            ->join('departments', 'students.department_id', '=', 'departments.id')
            ->groupBy('department_name')
            ->get();
        //dd($departmentWiseStudentCount);
        $semesterWiseStudentCount = Student::select('semesters.name as semester_name','semesters.year as semester_year', DB::raw('count(students.id) as student_count'))
            ->join('semesters', 'students.semester_id', '=', 'semesters.id')
            ->groupBy('semester_name','semester_year')
            ->get();
        return view('dashboard.dashboard',
            compact('totalDepartments',
            'totalStudents',
            'departmentWiseStudentCount',
            'semesterWiseStudentCount'));
    }
}
