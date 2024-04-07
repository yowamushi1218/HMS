<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function class()
    {
        return view('schedules');
    }

    public function manage()
    {
        return view('manage');
    }

    public function main()
    {
        return view('dashboard');
    }
    public function registration()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}
