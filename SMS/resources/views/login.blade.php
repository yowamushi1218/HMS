@extends('layouts.themes.login')
@section('content')
    <div class="container">
        <img src="{{ asset('assets/login/images/logo.png') }}" width="150">
        <header>
            <h2 class="register-link">Login</h2>
        </header>
        <form method="post" action="dashboard">
            @csrf
            <div class="form">
                <span class="title"></span>
                <div class="input-fields">
                    <div class="input-field">
                        <label>Email</label><br>
                        <input type="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-field">
                        <label>Password</label><br>
                        <input type="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="buttons">
                    <button class="sumbit">
                        <span class="btnText">Submit</span>
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </div>
                <div class="link">Not yet register ?&nbsp;<a href="register">Sign up here</a></div>
            </div>
        </form>
    </div>
@endsection
