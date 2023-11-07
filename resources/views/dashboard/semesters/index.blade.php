@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Semester</h1>
                    </div>
                    <div class="com-sm-12 col-md-6">
                        @role('admin')
                            <button type="button"
                                    class="btn btn-outline-info"
                                    data-toggle="modal"
                                    data-target="#add-semester-modal">Add Semester</button>
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
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($semesters as $semester)
                                <tr>
                                    <td>{{$semester->name}}</td>
                                    <td>{{$semester->year}}</td>
                                    @role('admin')
                                    <td>
                                        <a class="btn btn-outline-secondary" href="{{route('semesters.edit', [$semester->id])}}">Edit</a>
                                        <form action="{{route('semesters.destroy',[$semester->id])}}" method="POST">
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
    <div id="add-semester-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                </div>
                <form id="addSemesterForm" name="save" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" name="year" id="year" class="form-control">
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

            $("#addSemesterForm").submit(function (event) {
                event.preventDefault();
                submitForm();
            });

            function submitForm() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/semester/save') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('form#addSemesterForm').serialize(),
                    success: function (response) {
                        document.getElementById('add-semester-modal').style.display = 'none';
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
