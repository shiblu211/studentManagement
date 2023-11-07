@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Departments</h1>
                    </div>
                    <div class="com-sm-12 col-md-6">
                        @role('admin')
                        <button type="button" class="btn btn-outline-info"
                                data-toggle="modal"
                                data-target="#add-dept-modal">Add Department</button>
                        @endrole
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
                                <th>Total Credit</th>
                                <th>Head</th>
                                @role('admin')
                                    <th>Action</th>
                                @endrole
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->email}}</td>
                                    <td>{{$department->number}}</td>
                                    <td>{{$department->total_credit}}</td>
                                    <td>{{$department->department_head}}</td>
                                    @role('admin')
                                        <td>
                                            <a class="btn btn-outline-secondary" href="{{route('departments.edit', [$department->id])}}">Edit</a>
                                            <form action="{{route('departments.destroy',[$department->id])}}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline-danger"
                                                        href="">Delete</button>
                                            </form>

                                        </td>
                                    @endrole
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
    <div id="add-dept-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                </div>
                <form id="addDeptForm" name="save" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Total Credit</label>
                            <input type="text" name="total_credit" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Department Head</label>
                            <input type="text" name="department_head" class="form-control">
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

            $("#addDeptForm").submit(function (event) {
                event.preventDefault();
                submitForm();
            });

            function submitForm() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/departments/save') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('form#addDeptForm').serialize(),
                    success: function (response) {
                        document.getElementById('add-dept-modal').style.display = 'none';
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
