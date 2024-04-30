@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="active">Appointments</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="home">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3><strong class="card-title">Appointments</strong></h3>
                            <div class="form-group mt-4">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#AddRecordsModal" data-><span class="fa fa-plus"></span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Client</th>
                                        <th>Employee</th>
                                        <th>Reason's</th>
                                        <th>Services</th>
                                        <th>Start At</th>
                                        <th>Finish At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>Employee 1</td>
                                        <td>Can't Breath</td>
                                        <td>Heart Attack</td>
                                        <td>01:00PM</td>
                                        <td>02:00PM</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#ViewRecordsModal"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-success" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#EditRecordsModal"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#DeleteRecordsModal"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="AddRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Client</label>
                    <input class="form-control" name="client_name" type="text">
                </div>
                <div class="form-group">
                    <label>Reason's</label>
                    <input class="form-control" name="client_reason" type="text">
                </div>
                <div class="form-group">
                    <label>Employee</label>
                    <input class="form-control" name="client_user" type="text" value="{{ session('user_fname') }}">
                </div>
                <div class="form-group">
                    <label>Services</label>
                    <input class="form-control" name="client_services" type="text">
                </div>
                <div class="form-group">
                    <label>Date Start</label>
                    <input class="form-control" name="client_startAt" type="date">
                </div>
                <div class="form-group">
                    <label>Date End</label>
                    <input class="form-control" name="client_endAt" type="date">
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success"><span class="fa fa-paper-plane"></span> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ViewRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Details Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout this user?<p>
                <p>Are you sure you want to logout this user?<p>
                <p>Are you sure you want to logout this user?<p>
                <p>Are you sure you want to logout this user?<p>
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="EditRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Client</label>
                    <input class="form-control" name="client_name" type="text">
                </div>
                <div class="form-group">
                    <label>Reason's</label>
                    <input class="form-control" name="client_reason" type="text">
                </div>
                <div class="form-group">
                    <label>Employee</label>
                    <input class="form-control" name="client_user" type="text" value="{{ session('user_fname') }}">
                </div>
                <div class="form-group">
                    <label>Services</label>
                    <input class="form-control" name="client_services" type="text">
                </div>
                <div class="form-group">
                    <label>Date Start</label>
                    <input class="form-control" name="client_startAt" type="date">
                </div>
                <div class="form-group">
                    <label>Date End</label>
                    <input class="form-control" name="client_endAt" type="date">
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success"><span class="fa fa-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="DeleteRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout this appointment?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


