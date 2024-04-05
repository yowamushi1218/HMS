@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="active">Schedule</a></li>
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
                            <h3><strong class="card-title">Class Schedule</strong></h3>
                            <div class="form-group mt-4">
                                <label for="semester" class="mr-2"><strong>S.Y. Semester:</strong></label>
                                <select name="semester" id="semester">
                                    <option value="2023-2024 1st SEM">2023-2024 1st SEM</option>
                                    <option value="2023-2024 2nd SEM">2023-2024 2nd SEM</option>
                                </select>
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
                                        <th>Room</th>
                                        <th>Units</th>
                                        <th>Enrolled</th>
                                        <th>Posted</th>
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
                                        <td>B3</td>
                                        <td>3.00</td>
                                        <td>40</td>
                                        <td>No</td>
                                        <td class="text-center">
                                            <a href="{{ route('manage') }}" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-edit"></i> Manage</a>
                                            <a class="btn btn-danger" style="font-size: 13px; color: #fff;"><i class="fa fa-download"></i> Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1-0002</td>
                                        <td>FL</td>
                                        <td>Foreign Language</td>
                                        <td>02:00PM - 03:00PM</td>
                                        <td>MWF</td>
                                        <td>B3</td>
                                        <td>3.00</td>
                                        <td>40</td>
                                        <td>No</td>
                                        <td class="text-center">
                                            <a href="{{ route('manage') }}" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-edit"></i> Manage</a>
                                            <a class="btn btn-danger" style="font-size: 13px; color: #fff;"><i class="fa fa-download"></i> Download</a>
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
@endsection


