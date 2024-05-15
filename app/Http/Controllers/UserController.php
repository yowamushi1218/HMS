<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function userMain()
    {
        $currentDate = now()->format('Y-m-d');
        $totalUsers = DB::table('users')
            ->where('id', session('id'))
            ->where('user_role', 1)
            ->count();
        $totalAppointments = DB::table('appointments')
            ->whereDate('created_at', $currentDate)
            ->count();
        $totalClients = DB::table('clients')->count();

        $appointments = DB::table('appointments')
            ->whereDate('created_at', $currentDate)
            ->orderBy('app_id', 'asc')
            ->get();

        return view('users.dashboard', compact('appointments', 'totalUsers', 'totalAppointments','totalClients'));
    }
}
