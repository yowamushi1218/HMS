@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><h3>Appointment Form</h3></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="dashboard">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="SEND ADDRESS" id="ft-form" method="POST" accept-charset="UTF-8">
                                <fieldset>
                                    <legend>Personal Information</legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_type">Blood Type</label>
                                        <select class="form-control" id="blood_type" name="blood_type" required>
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
                                        <input type="number" class="form-control" id="height_cm" name="height_cm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight_kg">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight_kg" name="weight_kg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="allergies">Allergies</label>
                                        <textarea class="form-control" id="allergies" name="allergies" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="medications">Current Medications</label>
                                        <textarea class="form-control" id="medications" name="medications" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="medical_conditions">Medical Conditions</label>
                                        <textarea class="form-control" id="medical_conditions" name="medical_conditions" rows="3"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Contact Information</legend>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Appointment Request</legend>
                                    <div class="form-group">
                                        <label for="appointment_date">Date</label>
                                        <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="preferred_time">Preferred Time</label>
                                            <select class="form-control" id="preferred_time" name="preferred_time">
                                                <option value="" disabled selected>Select Time</option>
                                                <option value="morning">Morning</option>
                                                <option value="afternoon">Afternoon</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="reminder_preference">Reminder Preference</label>
                                            <select class="form-control" id="reminder_preference" name="reminder_preference">
                                                <option value="" disabled selected>Select Preference</option>
                                                <option value="email">Email</option>
                                                <option value="phone">Phone call</option>
                                                <option value="sms">SMS</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="btns">
                                    <input type="text" name="_gotcha" value="" style="display:none;">
                                    <input type="submit" class="btn btn-primary" value="Submit Request">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/userstyle.css') }}">
@endsection
