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

Route::post('schedules',[CustomController::class,'class']);
Route::get('schedules', [CustomController::class, 'class'])->name('home');
Route::get('/manage', [CustomController::class, 'manage'])->name('manage');



