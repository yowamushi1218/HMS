<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function welcome()
    {
        return view('home');
    }

    public function manage()
    {
        return view('manage');
    }
}
