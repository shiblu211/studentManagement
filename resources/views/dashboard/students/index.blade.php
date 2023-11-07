@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Students</h1>
                    </div>
                    <div class="com-sm-12 col-md-6">
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add-student-modal">Add Student</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Guardian Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->number}}</td>
                                    <td>{{$student->department->name}}</td>
                                    <td>{{$student->semester->name ?? 'New Student'}}</td>
                                    <td>{{$student->guardian_number}}</td>
                                    <td>
                                        <a class="btn btn-outline-secondary" href="{{route('students.edit', [$student->id])}}">Edit</a>
                                        <form action="{{route('students.destroy',[$student->id])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-danger"
                                                    href="">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection

@section('footer')
    {{--add modal--}}
    <div id="add-student-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                </div>
                <form id="addStudentForm" name="save" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" name="number" id="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="form-control">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="guardian_number">Guardians Number</label>
                            <input type="text" name="guardian_number" id="guardian_number" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-success" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--add modal --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {

            $("#addStudentForm").submit(function (event) {
                event.preventDefault();
                submitForm();
            });

            function submitForm() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/students/save') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('form#addStudentForm').serialize(),
                    success: function (response) {
                        document.getElementById('add-student-modal').style.display = 'none';
                        location.reload();
                    },
                    error: function (e) {
                        alert("Error");
                    }
                });
            }
        });
    </script>
@endsection
