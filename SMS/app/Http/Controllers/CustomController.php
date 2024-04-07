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
}
