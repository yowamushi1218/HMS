<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//login
Route::post('home',[CustomController::class,'welcome']);
Route::get('home', [CustomController::class, 'welcome'])->name('home');
Route::get('/manage', [CustomController::class, 'manage'])->name('manage');
// Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

//register
// Route::get('/register',[CustomAuthController::class,'registerUser']);
// Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
// Route::post('/register', [CustomAuthController::class, 'registration'])->name('user.registration');


