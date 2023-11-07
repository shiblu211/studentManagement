@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Student Edit</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form id="editDeptForm" name="update" role="form" action="{{route('students.update')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$student->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$student->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input type="text" name="number" class="form-control" value="{{$student->number}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Department</label>
                                    <select name="department_id" class="form-control">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"
                                                    @if($department->id == $student->department_id) selected @endif>
                                                {{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="number">Guardians Number</label>
                                    <input type="text" name="department_head" class="form-control" value="{{$student->guardian_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Semester</label>
                                    <select name="semester_id" class="form-control">
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}"
                                                    @if($semester->id == $student->semester_id) selected @endif>
                                                {{$semester->name."/".$semester->year}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$student->id}}">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-outline-success" id="submit">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection

@section('footer')
@endsection
