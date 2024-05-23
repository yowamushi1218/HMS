<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/admin/dashboard', [CustomController::class, 'main'])->name('admin.dashboard');
Route::get('/admin/home', [CustomController::class, 'home'])->name('admin.home');
Route::post('/admin/home/createAnnouncements', [CustomController::class, 'create_announcements'])->name('announcements.create');
Route::get('delete/{ann_id}', [CustomController::class, 'delete_announcements'])->name('delete_announcements');
Route::get('/default-charts', [CustomController::class, 'defaultCharts']);


//Login-Register
Route::get('register', [CustomController::class, 'viewregistration'])->name('register');
Route::post('register', [CustomController::class, 'add_register'])->name('add_register');
Route::get('login', [CustomController::class, 'login'])->name('login');
Route::post('admin.dashboard',[CustomController::class,'loginUser'])->name('add_login');

//Dashboard
Route::post('admin.schedules',[CustomController::class,'class']);
Route::get('admin.schedules', [CustomController::class, 'class'])->name('schedules');
Route::get('admin.manage_schedules', [CustomController::class, 'manageSchedules'])->name('manage_schedules');
Route::post('/appointments', [CustomController::class, 'appointment'])->name('appointments');
Route::post('/admin.message',[CustomController::class,'sendsms'])->name('send.sms');
Route::get('admin.message', [CustomController::class, 'viewmessage'])->name('admin.messages');

Route::get('/admin.manage', [CustomController::class, 'manage'])->name('manage');
Route::post('delete',[CustomController::class, 'delete'])->name('delete');

//Records
Route::get('/admin.profile', [CustomController::class, 'profile'])->name('profile');
Route::get('/admin.clients', [CustomController::class, 'clients'])->name('clients');
Route::get('/admin.users', [CustomController::class, 'users'])->name('users');
Route::post('/remove-users', [CustomController::class, 'remove'])->name('removeUsers');
Route::post('/add-users', [CustomController::class, 'add_register'])->name('addUsers');
Route::post('admin.profile', [CustomController::class, 'updateInfo'])->name('updateInfo');
Route::post('/delete/appointment', [CustomController::class, 'deleteAppointment'])->name('deleteAppointment');


//Logout
Route::post('/logout', [CustomController::class, 'logout'])->name('logout');

//Header
Route::get('/layouts.partials.header', [CustomController::class, 'header']);

Route::post('/admin/schedules', [CustomController::class, 'updateAppointment'])->name('updateAppointment');

//Users
Route::get('/users/dashboard', [UserController::class, 'userMain'])->name('users.dashboard');

