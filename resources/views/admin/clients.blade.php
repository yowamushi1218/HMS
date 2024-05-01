@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="active">Clients</a></li>
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
                            <h3><strong class="card-title">Client Records</strong></h3>
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
                                        <th>Doctor</th>
                                        <th>Disease</th>
                                        <th>Visit</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $index => $client)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $client->client_fname }}</td>
                                        <td>{{ $client->client_doctor }}</td>
                                        <td>{{ $client->client_disease }}</td>
                                        <td>{{ \Carbon\Carbon::parse($client->client_visit)->format('F d, Y H:i') }}</td>
                                        <td>
                                            @if($client->client_active == '1')
                                                <span class="badge badge-success">Active</span>
                                            @elseif($client->client_active == '-1')
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#ViewRecordsModal{{ $client->client_id }}"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-success" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#EditRecordsModal{{ $client->client_id }}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#DeleteRecordsModal{{ $client->client_id }}"><i class="fa fa-trash"></i></a>
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
                            <label>Fullname</label>
                            <input class="form-control" name="client_fname" type="text">
                        </div>
                        <div class="form-group">
                            <label>Disease</label>
                            <input class="form-control" name="client_disease" type="text">
                        </div>
                        <input class="form-control" name="client_doctor" type="hidden" value="{{ session('user_fname') }}">
                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea class="form-control" name="client_symptoms" type="text" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Visit</label>
                            <input class="form-control" name="client_visit" type="datetime-local">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                           <select class="form-control" name="client_active">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                           </select>
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
@foreach ($clients as $client)
    <div id="ViewRecordsModal{{$client->client_id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details Records</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class="ml-auto">{{$client->createdAt }}</label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <b>Client</b>
                            <p>{{$client->client_fname }}</p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Doctor</b>
                            <p>{{$client->client_doctor }}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <b>Disease</b>
                            <p>{{$client->client_disease }}</p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Symptoms</b>
                            <p>{{$client->client_symptoms }}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <b>Address</b>
                            <p>{{$client->client_address }}</p>
                        </div>
                    </div>
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
<div id="EditRecordsModal{{$client->client_id }}" class="modal fade" role="dialog">
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
                        <input class="form-control" name="client_fname" value="{{$client->client_fname }}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Reason's</label>
                        <input class="form-control" name="client_disease" value="{{$client->client_disease }}" type="text">
                    </div>
                    <input name="client_id" type="hidden" value="{{$client->client_id }}">
                    <div class="form-group">
                        <label>Symptoms</label>
                        <textarea class="form-control" name="client_symptoms" type="text" rows="5">{{$client->client_symptoms }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Visit</label>
                        <input class="form-control" name="client_visit" value="{{$client->client_visit }}" type="datetime-local">
                    </div>
                    <div class="form-group">
                        <label id="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="client_active">
                            @if($client->client_active == 1)
                                <option value="1">Active</option>
                                <option value="-1">Inactive</option>
                            @elseif($client->client_active == -1)
                                <option value="-1">Inactive</option>
                                <option value="1">Active</option>
                            @endif
                        </select>
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
<div id="DeleteRecordsModal{{$client->client_id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this client?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('delete') }}">
                    @csrf
                    <input type="hidden" name="client_id" value="{{$client->client_id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection


