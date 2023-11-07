@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Department Edit</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form id="editDeptForm" name="update" role="form" action="{{route('departments.update')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$department->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$department->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input type="text" name="number" class="form-control" value="{{$department->number}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Total Credit</label>
                                    <input type="text" name="total_credit" class="form-control" value="{{$department->total_credit}}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Department Head</label>
                                    <input type="text" name="department_head" class="form-control" value="{{$department->department_head}}">
                                </div>

                                <input type="hidden" name="id" value="{{$department->id}}">
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
