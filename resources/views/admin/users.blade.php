@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="active">User</a></li>
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
                            <h3><strong class="card-title">User Records</strong></h3>
                            <div class="form-group mt-4">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#AddRecordsModal" data-><span class="fa fa-plus"></span></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Fullname</th>
                                        <th>Birthday</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->user_fname }}</td>
                                            <td>{{ \Carbon\Carbon::parse($user->user_bday)->format('F d, Y') }}</td>
                                            <td>{{ $user->user_phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->user_role == '1')
                                                    <span class="badge badge-success">Admin</span>
                                                @elseif($user->user_role == '2')
                                                    <span class="badge badge-primary">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->user_is_active == '1')
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($user->user_is_active == '-1')
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#EditRecordsModal{{ $user->id }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#DeleteRecordsModal{{ $user->id }}"><i class="fa fa-trash"></i></a>
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
                <form method="POST" action="{{ route('updateAppointment') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Fullname</label>
                            <input class="form-control" name="user_fname" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birthday</label>
                            <input class="form-control" name="user_bday" type="date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input class="form-control" name="user_phone" type="number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_gender">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="user_address" type="text">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nationality</label>
                            <input class="form-control" name="user_nationality" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Province</label>
                            <input class="form-control" name="user_province" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>District</label>
                            <input class="form-control" name="user_district" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Purok</label>
                            <input class="form-control" name="user_blockno" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Street</label>
                            <input class="form-control" name="user_lotno" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label id="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_is_active">
                                <option value="1">Active</option>
                                <option value="-1">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="user_role">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success"><span class="fa fa-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($users as $user)
<div id="EditRecordsModal{{$user->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateAppointment') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Fullname</label>
                            <input class="form-control" name="user_fname" value="{{$user->user_fname }}" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birthday</label>
                            <input class="form-control" name="user_bday" value="{{$user->user_bday }}" type="date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input class="form-control" name="user_phone" type="number" value="{{$user->user_phone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_gender">
                                @if($user->user_gender == 'female')
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                @elseif($user->user_gender == 'male')
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="user_address" type="text" value="{{$user->user_address }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nationality</label>
                            <input class="form-control" name="user_nationality" type="text" value="{{$user->user_nationality }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Province</label>
                            <input class="form-control" name="user_province" type="text" value="{{$user->user_province }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>District</label>
                            <input class="form-control" name="user_district" type="text" value="{{$user->user_district }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Purok</label>
                            <input class="form-control" name="user_blockno" type="text" value="{{$user->user_blockno }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Street</label>
                            <input class="form-control" name="user_lotno" type="text" value="{{$user->user_lotno }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label id="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_is_active">
                                @if($user->user_is_active == 1)
                                    <option value="1">Active</option>
                                    <option value="-1">Inactive</option>
                                @elseif($user->user_is_active == -1)
                                    <option value="-1">Inactive</option>
                                    <option value="1">Active</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="user_role">
                            @if($user->user_role == 1)
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            @elseif($user->user_is_active == 2)
                                <option value="2">User</option>
                                <option value="1">Admin</option>
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
    <div id="DeleteRecordsModal{{ $user->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Records</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?<p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id }}">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection


