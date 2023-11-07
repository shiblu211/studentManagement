<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/register', [StudentRegistrationController::class, 'create']);
Route::post('/student/register', [StudentRegistrationController::class, 'register'])->name('student.register');
Route::post('/validate-email', [StudentRegistrationController::class, 'validateEmail']);



Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/departments/save', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::post('/departments/update', [DepartmentController::class, 'update'])->name('departments.update');
        Route::post('/departments/delete/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

        Route::post('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

        Route::post('/semester/save', [SemesterController::class, 'store'])->name('semesters.store');
        Route::get('/semesters/edit/{id}', [SemesterController::class, 'edit'])->name('semesters.edit');
        Route::post('/semesters/update', [SemesterController::class, 'update'])->name('semesters.update');
        Route::post('/semesters/delete/{id}', [SemesterController::class, 'destroy'])->name('semesters.destroy');

    });

    Route::get('/semesters', [SemesterController::class, 'index'])->name('semesters.index');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students/save', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update', [StudentController::class, 'update'])->name('students.update');



});

