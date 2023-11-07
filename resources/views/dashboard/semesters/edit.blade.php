@extends('dashboard.layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="m-0">Semester Edit</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form id="editSemesterForm" name="update" role="form" action="{{route('semesters.update')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$semester->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" class="form-control" value="{{$semester->number}}">
                                </div>

                                <input type="hidden" name="id" value="{{$semester->id}}">
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
