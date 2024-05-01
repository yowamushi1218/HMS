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
                                    @foreach ($appointments as $index => $sched)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $sched->app_name }}</td>
                                            <td>{{ $sched->app_user }}</td>
                                            <td>{{ $sched->app_reason }}</td>
                                            <td>{{ $sched->app_services }}</td>
                                            <td>{{ \Carbon\Carbon::parse($sched->app_startAt)->format('F d, Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($sched->app_endAt)->format('F d, Y H:i') }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-info" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#ViewRecordsModal{{ $sched->app_id }}"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-success" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#EditRecordsModal{{ $sched->app_id }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#DeleteRecordsModal{{ $sched->app_id }}"><i class="fa fa-trash"></i></a>
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
                <form method="POST" action="{{ route('appointments') }}">
                    @csrf
                        <div class="form-group">
                            <label>Client</label>
                            <input class="form-control" name="app_name" type="text">
                        </div>
                        <div class="form-group">
                            <label>Reason's</label>
                            <input class="form-control" name="app_reason" type="text">
                        </div>
                        <input class="form-control" name="app_user" type="hidden" value="{{ session('user_fname') }}">
                        <div class="form-group">
                            <label>Services</label>
                            <input class="form-control" name="app_services" type="text">
                        </div>
                        <div class="form-group">
                            <label>Date Start</label>
                            <input class="form-control" name="app_startAt" type="datetime-local">
                        </div>
                        <div class="form-group">
                            <label>Date End</label>
                            <input class="form-control" name="app_endAt" type="datetime-local">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-success"><span class="fa fa-paper-plane"></span> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@foreach ($appointments as $sched)
    <div id="ViewRecordsModal{{ $sched->app_id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details Records</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Date</label>
                    <p>{{ $sched->createdAt }}</p>
                    <label>app</label>
                    <p>{{ $sched->app_name }}</p>
                    <label>Reason's</label>
                    <p>{{ $sched->app_reason }}</p>
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
<div id="EditRecordsModal{{ $sched->app_id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateAppointment') }}">
                    @csrf
                    <div class="form-group">
                        <label>Client</label>
                        <input class="form-control" name="app_name" value="{{ $sched->app_name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Reason's</label>
                        <input class="form-control" name="app_reason" value="{{ $sched->app_reason }}" type="text">
                    </div>
                    <input name="app_id" type="hidden" value="{{ $sched->app_id }}">
                    <div class="form-group">
                        <label>Services</label>
                        <input class="form-control" name="app_services" value="{{ $sched->app_services }}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Date Start</label>
                        <input class="form-control" name="app_startAt" value="{{ $sched->app_startAt }}" type="datetime-local">
                    </div>
                    <div class="form-group">
                        <label>Date End</label>
                        <input class="form-control" name="app_endAt" value="{{ $sched->app_endAt }}" type="datetime-local">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success"><span class="fa fa-pencil"></span> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="DeleteRecordsModal{{ $sched->app_id }}" class="modal fade" role="dialog">
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
                <form method="POST" action="{{ route('delete') }}">
                    @csrf
                    <input type="hidden" name="app_id" value="{{ $sched->app_id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection




