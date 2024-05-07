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
                                        <th>Phone</th>
                                        <th>Condition's</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $index => $sched)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $sched->full_name }}</td>
                                            <td>{{ $sched->app_phone }}</td>
                                            <td>{{ $sched->app_medical_conditions }}</td>
                                            <td>{{ $sched->app_preferred_time }}</td>
                                            <td>{{ \Carbon\Carbon::parse($sched->app_appointment_date)->format('F d, Y H:i') }}</td>
                                            <td>
                                                @if($sched->app_active == '1')
                                                    <span class="badge badge-success">On-going</span>
                                                @elseif($sched->app_active == '2')
                                                    <span class="badge badge-primary">Approved</span>
                                                @elseif($sched->app_active == '-1')
                                                    <span class="badge badge-warning">Cancelled</span>
                                                @elseif($sched->app_active == '0')
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('appointments') }}">
                    @csrf
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="app_fname" name="app_fname" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" class="form-control" id="app_mname" name="app_mname" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="app_lname" name="app_lname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="app_address" rows="3"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="app_bday" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="app_gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="blood_type">Blood Type</label>
                                <select class="form-control" id="blood_type" name="app_blood_type" required>
                                    <option value="" disabled selected>Select Blood Type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Health Information</legend>
                            <div class="form-group">
                                <label for="height_cm">Height (cm)</label>
                                <input type="number" class="form-control" id="height_cm" name="app_height_cm" required>
                            </div>
                            <div class="form-group">
                                <label for="weight_kg">Weight (kg)</label>
                                <input type="number" class="form-control" id="weight_kg" name="app_weight_kg" required>
                            </div>
                            <div class="form-group">
                                <label for="allergies">Allergies</label>
                                <textarea class="form-control" id="allergies" name="app_allergies" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="medications">Current Medications</label>
                                <textarea class="form-control" id="medications" name="app_medications" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="medical_conditions">Medical Conditions</label>
                                <textarea class="form-control" id="medical_conditions" name="app_medical_conditions" rows="3"></textarea>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Contact Information</legend>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="app_email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="app_phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="app_contact_address" rows="3"></textarea>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Appointment Request</legend>
                            <div class="form-group">
                                <label for="appointment_date">Date</label>
                                <input type="date" class="form-control" id="appointment_date" name="app_appointment_date" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="preferred_time">Preferred Time</label>
                                    <select class="form-control" id="preferred_time" name="app_preferred_time">
                                        <option value="" disabled selected>Select Time</option>
                                        <option value="morning">Morning</option>
                                        <option value="afternoon">Afternoon</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="reminder_preference">Reminder Preference</label>
                                    <select class="form-control" id="reminder_preference" name="app_reminder_preference">
                                        <option value="" disabled selected>Select Preference</option>
                                        <option value="email">Email</option>
                                        <option value="phone">Phone call</option>
                                        <option value="sms">SMS</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="app_active">Status Preference</label>
                                    <select class="form-control" id="app_active" name="app_active">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="1">On-going</option>
                                        <option value="-1">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details Records</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="EditRecordsModal{{ $sched->app_id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Records</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateAppointment') }}">
                    @csrf
                    <fieldset>
                        <legend>Personal Information</legend>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="app_fname" name="app_fname" value="{{ $sched->app_fname }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" id="app_mname" name="app_mname" value="{{ $sched->app_mname }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="app_lname" name="app_lname" value="{{ $sched->app_lname }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="app_address" rows="3">{{ $sched->app_address }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="app_bday" value="{{ $sched->app_bday }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="app_gender" required>
                                    <option value="" disabled>Select Gender</option>
                                    <option value="Male" {{ $sched->app_gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $sched->app_gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $sched->app_gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <select class="form-control" id="blood_type" name="app_blood_type" required>
                                <option value="" disabled>Select Blood Type</option>
                                <option value="A+" {{ $sched->app_blood_type == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $sched->app_blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ $sched->app_blood_type == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $sched->app_blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ $sched->app_blood_type == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $sched->app_blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ $sched->app_blood_type == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $sched->app_blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Health Information</legend>
                        <div class="form-group">
                            <label for="height_cm">Height (cm)</label>
                            <input type="number" class="form-control" id="height_cm" name="app_height_cm" value="{{ $sched->app_height_cm }}" required>
                        </div>
                        <div class="form-group">
                            <label for="weight_kg">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight_kg" name="app_weight_kg" value="{{ $sched->app_weight_kg }}" required>
                        </div>
                        <div class="form-group">
                            <label for="allergies">Allergies</label>
                            <textarea class="form-control" id="allergies" name="app_allergies" rows="3">{{ $sched->app_allergies }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="medications">Current Medications</label>
                            <textarea class="form-control" id="medications" name="app_medications" rows="3">{{ $sched->app_medications }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="medical_conditions">Medical Conditions</label>
                            <textarea class="form-control" id="medical_conditions" name="app_medical_conditions" rows="3">{{ $sched->app_medical_conditions }}</textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="app_email" value="{{ $sched->app_email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="app_phone" value="{{ $sched->app_phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="app_contact_address" rows="3">{{ $sched->app_contact_address }}</textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Appointment Request</legend>
                        <div class="form-group">
                            <label for="appointment_date">Date</label>
                            <input type="datetime-local" class="form-control" id="appointment_date" name="app_appointment_date" value="{{ $sched->app_appointment_date }}" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="preferred_time">Preferred Time</label>
                                <select class="form-control" id="preferred_time" name="app_preferred_time">
                                    <option value="" disabled>Select Time</option>
                                    <option value="Morning" {{ $sched->app_preferred_time == 'morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="Afternoon" {{ $sched->app_preferred_time == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="reminder_preference">Reminder Preference</label>
                                <select class="form-control" id="reminder_preference" name="app_reminder_preference">
                                    <option value="" disabled>Select Preference</option>
                                    <option value="email" {{ $sched->app_reminder_preference == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="phone" {{ $sched->app_reminder_preference == 'phone' ? 'selected' : '' }}>Phone call</option>
                                    <option value="sms" {{ $sched->app_reminder_preference == 'sms' ? 'selected' : '' }}>SMS</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="app_active">Status Preference</label>
                                <select class="form-control" id="app_active" name="app_active">
                                    <option value="" disabled>Select Status</option>
                                    <option value="1" {{ $sched->app_active == '1' ? 'selected' : '' }}>On-going</option>
                                    <option value="2" {{ $sched->app_active == '2' ? 'selected' : '' }}>Approved</option>
                                    <option value="-1" {{ $sched->app_active == '-1' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-pencil"></span> Update</button>
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
                <form method="POST" action="{{ route('deleteAppointment') }}">
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




