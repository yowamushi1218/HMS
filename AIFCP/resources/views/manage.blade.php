@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li class="active">Manage</li>
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
                    <div class="alert alert-primary">
                        <p class="alert-content"><strong>Class Code: 1-0020 | Title: NGEC-5 | Description: Purposive Communication | Time: 01:00PM - 02:00PM | Day: MWF | Enrolled:</strong> <span class="badge badge-info">40</span></p>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('home') }}" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-arrow-left"></i> Back</a>
                            <button type="file" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-upload"></i> Upload Grades</button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>Course</th>
                                        <th>Level</th>
                                        <th>Grade</th>
                                        <th>Rating</th>
                                        <th>Equivalent</th>
                                        <th>Interpretation</th>
                                        <th>Posted</th>
                                        <th>Posted by</th>
                                        <th>Lab Code</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>232401-0221</td>
                                        <td>Absin, Eric Enoc</td>
                                        <td>M</td>
                                        <td>BSMT</td>
                                        <td>1st Year</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>No</td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>232401-0389</td>
                                        <td>Alcazar, Carl Justine Pilapil</td>
                                        <td>M</td>
                                        <td>BSMT</td>
                                        <td>1st Year</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>No</td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary" style="font-size: 13px; color: #fff;"><i class="fa fa-edit"></i> Edit</a>
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


