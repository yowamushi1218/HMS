@extends('layouts.themes.register')
@section('content')
    <div class="container">
        <header>
            <a class="login-link" href="login" title="Back to Login"><i class="fa fa-arrow-left"></i></a> &nbsp;
            <a class="register-link">Registration</a>
        </header>
        <form method="post" action="{{ route('add_register') }}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    <span class="title">Account Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="user_fname" placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="user_bday" placeholder="Enter birth date" required>
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
                            <label>Mobile Number</label>
                            <input type="number" name="user_phone" placeholder="Enter mobile number" required>
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <span class="title">Other Details</span>
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
                            <label>Purok</label>
                            <input type="text" name="user_blockno" placeholder="Enter your purok" required>
                        </div>
                        <div class="input-field">
                            <label>Street</label>
                            <input type="text" name="user_lotno" placeholder="Enter your street" required>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="sumbit" name="submit" id="submit">
                            <span class="btnText">Submit</span>
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
