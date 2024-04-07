@extends('layouts.themes.login')
@section('content')
<section id="login-user">
    <div class="d-flex justify-content-center mt-4">
        <h1 class="text-center mb-1" style="color:rgb(255, 255, 255); font-weight: bold; font-size: 70px; text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);">S.M.S</h1>
    </div>
    <div class="login-page">
    <div class="form">
        <form class="register-form" method="POST" action="schedules">
            @csrf
            <h4 class="text-left text-white">Register</h4>
            <div style="position: relative;">
                <i class="fas fa-user" style="position: absolute; top: 40%; left: 15px; transform: translateY(-50%);"></i>
                <input type="text" placeholder="Username"/>
            </div>
            <div style="position: relative;">
                <i class="fas fa-envelope" style="position: absolute; top: 40%; left: 15px; transform: translateY(-50%);"></i>
                <input type="email" placeholder="Email Address"/>
            </div>
            <div style="position: relative;">
                <i class="fas fa-lock" style="position: absolute; top: 40%; left: 15px; transform: translateY(-50%);"></i>
                <input type="password" placeholder="Password"/>
            </div>
            <button class="register-button">Register your account</button><br>
            <div class="create-account">
                <p class="message">Already registered? <a href="#">Back to login</a></p>
            </div>
        </form>
        <form class="login-form" method="POST" action="schedules">
            @csrf
            <h4 class="text-left text-white">Login</h4>
            <div style="position: relative;">
                <i class="fas fa-user" style="position: absolute; top: 40%; left: 15px; transform: translateY(-50%);"></i>
                <input type="text" placeholder="Username"/>
            </div>
            <div style="position: relative;">
                <i class="fas fa-lock" style="position: absolute; top: 40%; left: 15px; transform: translateY(-50%);"></i>
                <input type="password" placeholder="Password"/>
            </div>
            <button class="login-button">Login your account</button><br>
            <div class="create-account">
                <p class="message">Not yet registered? <a href="#">Create an account</a></p>
            </div>
        </form>
    </div>
</div>
</section>
@endsection
