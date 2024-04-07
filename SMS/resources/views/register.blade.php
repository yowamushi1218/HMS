@extends('layouts.themes.register')
@section('content')
    <div class="container">
        {{-- <img src="{{ asset('assets/login/images/logo.png') }}" width="150"> --}}
        <header>
            <a class="login-link" href="login" title="Back to Login"><i class="fa fa-arrow-left"></i></a> &nbsp;
            <a class="register-link">Registration</a>
        </header>
        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Student Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="user_fname" placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="user_bday" placeholder="Enter birth date" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="user_phone" placeholder="Enter your email" required>
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="user_phone" placeholder="Enter mobile number" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select name="user_gender" required>
                                <option disabled selected>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Course</label>
                            <input type="text" name="user_course" placeholder="Enter your course" required>
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <span class="title">Address Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="user_address" placeholder="Enter address" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" name="user_nationality" placeholder="Enter nationality" required>
                        </div>
                        <div class="input-field">
                            <label>Province</label>
                            <input type="text" name="user_province" placeholder="Enter province" required>
                        </div>
                        <div class="input-field">
                            <label>Barangay</label>
                            <input type="text" name="user_district" placeholder="Enter barangay" required>
                        </div>
                        <div class="input-field">
                            <label>Block Number</label>
                            <input type="number" name="user_blockno" placeholder="Enter block number" required>
                        </div>
                        <div class="input-field">
                            <label>Lot Number</label>
                            <input type="number" name="user_lotno" placeholder="Enter lot number" required>
                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="form second">
                <div class="details address">
                    <span class="title">Family Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" name="father_fname" placeholder="Enter father name" required>
                        </div>
                        <div class="input-field">
                            <label>Father Birthday</label>
                            <input type="date" name="father_bday" placeholder="Enter father birthday" required>
                        </div>
                        <div class="input-field">
                            <label>Father Birthplace</label>
                            <input type="text" name="father_bplace" placeholder="Enter father birth place" required>
                        </div>
                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" name="mother_fname" placeholder="Enter mother name" required>
                        </div>
                        <div class="input-field">
                            <label>Mother Birthday</label>
                            <input type="date" name="mother_bday" placeholder="Enter mother birthday" required>
                        </div>
                        <div class="input-field">
                            <label>Mother Birthplace</label>
                            <input type="text" name="mother_bplace" placeholder="Enter mother birth place" required>
                        </div>
                    </div>
                </div>
                <div class="details family">
                    {{-- <span class="title">Family Home Details</span> --}}
                    <div class="fields">
                        <div class="input-field">
                            <label>Father Contact Number</label>
                            <input type="number" name="father_phoneno" placeholder="Enter father phone number" required>
                        </div>
                        <div class="input-field">
                            <label>Mother Contact Number</label>
                            <input type="number" placeholder="Enter mother contact number" required>
                        </div>
                        <div class="input-field">
                            <label>Home Address</label>
                            <input type="text" name="family_address" placeholder="Enter home address" required>
                        </div>
                        <div class="input-field">
                            <label>City</label>
                            <input type="text" name="family_city" placeholder="Enter city" required>
                        </div>
                        <div class="input-field">
                            <label>Province</label>
                            <input type="text" name="family_province" placeholder="Enter province" required>
                        </div>
                        <div class="input-field">
                            <label>Zip Code</label>
                            <input type="number" name="family_zipcode" placeholder="Enter zip code" required>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="fa fa-arrow-right"></i>
                            <span class="btnText">Back</span>
                        </div>
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
