@extends('layouts.themes.login')
@section('content')
    <div class="container">
        <img src="{{ asset('assets/login/images/logo.png') }}" width="150">
        <header>
            <h2 class="register-link">Login</h2>
        </header>
        @if(session('success'))
            <script>
                SwissAlert.success('{{ session('success') }}');
            </script>
        @endif
        @if(session('error'))
            <script>
                SwissAlert.error('{{ session('error') }}');
            </script>
        @endif
        <form method="post" action="admin.dashboard">
            @csrf
            <div class="form">
                <span class="title"></span>
                <div class="input-fields">
                    <div class="input-field">
                        <label>Email</label><br>
                        <i class="icon fas fa-envelope"></i>
                        <input type="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-field">
                        <label>Password</label><br>
                        <input type="password" placeholder="Enter your password" required>
                        <i class="icon fas fa-lock"></i>
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
