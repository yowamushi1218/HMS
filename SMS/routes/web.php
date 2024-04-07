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
Route::post('admin.dashboard', [CustomController::class, 'main'])->name('dashboard');
Route::get('admin.dashboard', [CustomController::class, 'main'])->name('dashboard');

//Login-Register
Route::get('register', [CustomController::class, 'viewregistration'])->name('register');
// Route::post('register', [CustomController::class, 'add_register'])->name('add_register');
Route::get('login', [CustomController::class, 'login'])->name('login');

//Class Shedules
Route::post('admin.schedules',[CustomController::class,'class']);
Route::get('admin.schedules', [CustomController::class, 'class'])->name('schedules');
Route::get('/admin.manage', [CustomController::class, 'manage'])->name('manage');

//Admin-Profile
Route::get('admin.profile', [CustomController::class, 'profile'])->name('profile');



