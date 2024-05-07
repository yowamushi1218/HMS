@extends('layouts.themes.login')
@section('content')
<div class="container">
    <img src="{{ asset('assets/login/images/logo.svg') }}" width="150">
    <form method="post" action="{{ route('add_login') }}">
        @csrf
        <div class="form">
            <div class="input-fields">
                <div class="input-field">
                    <label>Email</label><br>
                    <i class="icon fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-field">
                    <label>Password</label><br>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="icon fas fa-lock"></i>
                </div>
                @if(session('error'))
                <div class="text-danger mt-2" style="font-size: 12px; color: red;">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="buttons">
                <button type="submit" class="submit">
                    <span class="btnText">Submit</span>
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>
            {{-- <div class="link">Not yet registered?&nbsp;<a href="{{ route('register') }}">Sign up here</a></div> --}}
        </div>
    </form>
</div>
@endsection
