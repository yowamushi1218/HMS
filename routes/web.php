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

//Dashboard
Route::get('admin.dashboard', [CustomController::class, 'main'])->name('dashboard');

//Login-Register
Route::get('register', [CustomController::class, 'viewregistration'])->name('register');
Route::post('register', [CustomController::class, 'add_register'])->name('add_register');
Route::get('login', [CustomController::class, 'login'])->name('login');
Route::post('admin.dashboard',[CustomController::class,'loginUser'])->name('add_login');

//Dashboard
Route::post('admin.schedules',[CustomController::class,'class']);
Route::get('admin.schedules', [CustomController::class, 'class'])->name('schedules');
Route::post('/appointments', [CustomController::class, 'appointment'])->name('appointments');
Route::post('/update', [CustomController::class, 'updateAppointment'])->name('updateAppointment');
Route::get('/admin.manage', [CustomController::class, 'manage'])->name('manage');
Route::post('delete',[CustomController::class, 'delete'])->name('delete');

//Admin-Profile
Route::get('/admin.profile', [CustomController::class, 'profile'])->name('profile');
Route::post('admin.profile', [CustomController::class, 'updateInfo'])->name('updateInfo');

//Logout
Route::post('/logout', [CustomController::class, 'logout'])->name('logout');

//Header
Route::get('/layouts.partials.header', [CustomController::class, 'header']);


