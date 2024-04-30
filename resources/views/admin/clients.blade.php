@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="active">Schedules</a></li>
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#AddRecordsModal" data-><span class="fa fa-plus"></span> Add Records</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                        <th>Day</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1-0001</td>
                                        <td>NGEC-5</td>
                                        <td>Purposive Communication</td>
                                        <td>01:00PM - 02:00PM</td>
                                        <td>MWF</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#ViewRecordsModal"><i class="fa fa-eye"></i> View</a>
                                            <a href="#" class="btn btn-success" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#EditRecordsModal"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger" style="font-size: 13px; color: #fff;"><i class="fa fa-trash"></i> Delete</a>
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
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="hidden" name="doc_modified_by" value="#">
                    <input type="hidden" name="doc_uuid" value="#">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-power-off"></span> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ViewRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="hidden" name="doc_modified_by" value="#">
                    <input type="hidden" name="doc_uuid" value="#">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-power-off"></span> Logout</button>
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
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="hidden" name="doc_modified_by" value="#">
                    <input type="hidden" name="doc_uuid" value="#">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-power-off"></span> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="DeleteRecordsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="hidden" name="doc_modified_by" value="#">
                    <input type="hidden" name="doc_uuid" value="#">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-power-off"></span> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


