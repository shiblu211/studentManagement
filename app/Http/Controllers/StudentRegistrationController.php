<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StudentRegistrationController extends Controller
{
    public function create()
    {
        return view('students.register');
    }

    public function register(Request $request)
    {
        $admin = Role::firstOrCreate(['name' => 'student']);
        $student = Student::where('email', $request->email)->first();
        $studentUser = User::create([
            'name' => $student->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $studentUser->assignRole('student');

        return redirect(route('dashboard'));
    }

    public function validateEmail(Request $request)
    {
        $exists = Student::where('email', $request->email)->exists();

        if ($exists){
            return 'exists';
        }
        else
        {
            return 'not-exists';
        }
    }

}
