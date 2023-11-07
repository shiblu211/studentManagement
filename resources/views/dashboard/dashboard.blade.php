@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @role('admin')
                            <h1 class="m-0">Dashboard</h1>
                        @else
                            <h1 class="m-0">Student Dashboard</h1>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        {{--content for admin--}}
        @role('admin')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Departments</h5>
                                <p class="card-text">
                                    {{$totalDepartments}}
                                </p>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Total Students</h5>
                                <p class="card-text">
                                    {{$totalStudents}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Department Name</th>
                                <th>Total Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departmentWiseStudentCount as $departmentStudent)
                                <tr>
                                    <td>{{$departmentStudent->department_name}}</td>
                                    <td>{{$departmentStudent->student_count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Semester Name</th>
                                <th>Total Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($semesterWiseStudentCount as $semesterStudent)
                                <tr>
                                    <td>{{$semesterStudent->semester_name."/".$semesterStudent->semester_year}}</td>
                                    <td>{{$semesterStudent->student_count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        @endrole

    </div>
@endsection

@section('footer')
@endsection
