<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function class()
    {
        return view('admin.schedules');
    }

    public function manage()
    {
        return view('admin.manage');
    }

    public function main()
    {
        return view('admin.dashboard');
    }

    public function viewregistration()
    {
        return view('register');
    }

    public function add_register(Request $request)
    {
        if ($request->has('submit')) {

            $validatedData = $request->validate([
                'user_fname' => 'required|string|max:255',
                'user_bday' => 'required|date',
                'user_email' => 'required|email',
                'user_phone' => 'required|numeric',
                'user_gender' => 'required',
                'user_course' => 'required',
                'user_address' => 'required',
                'user_nationality' => 'required',
                'user_province' => 'required',
                'user_district' => 'required',
                'user_blockno' => 'required|numeric',
                'user_lotno' => 'required|numeric',
                'father_fname' => 'required|string|max:255',
                'father_bday' => 'required|date',
                'father_bplace' => 'required',
                'mother_fname' => 'required|string|max:255',
                'mother_bday' => 'required|date',
                'mother_bplace' => 'required',
                'father_phoneno' => 'required|numeric',
                'mother_phoneno' => 'required|numeric',
                'family_address' => 'required',
                'family_city' => 'required',
                'family_province' => 'required',
                'family_zipcode' => 'required|numeric',
            ]);

            $users = DB::table('users')->insert([
                'user_fname' => $request->input('user_fname'),
                'user_bday' => $request->input('user_bday'),
                'user_phone' => $request->input('user_phone'),
                'user_gender' => $request->input('user_gender'),
                'user_email' => $request->input('user_email'),
                'user_course' => $request->input('user_course'),
                'user_address' => $request->input('user_address'),
                'user_nationality' => $request->input('user_nationality'),
                'user_province' => $request->input('user_province'),
                'user_district' => $request->input('user_district'),
                'user_blockno' => $request->input('user_blockno'),
                'user_lotno' => $request->input('user_lotno'),
                'user_is_active' => 1,
                'user_created_at' => now(),
            ]);

            $family = DB::table('family_details')->insert([
                'father_fname' => $request->input('father_fname'),
                'father_bday' => $request->input('father_bday'),
                'father_bplace' => $request->input('father_bplace'),
                'mother_fname' => $request->input('mother_fname'),
                'mother_bday' => $request->input('mother_bday'),
                'mother_bplace' => $request->input('mother_bplace'),
                'father_phoneno' => $request->input('father_phoneno'),
                'mother_phoneno' => $request->input('mother_phoneno'),
                'family_address' => $request->input('family_address'),
                'family_city' => $request->input('family_city'),
                'family_province' => $request->input('family_province'),
                'family_zipcode' => $request->input('family_zipcode'),
                'family_created_at' => now(),
            ]);

            return redirect()->route('login')->with('success', 'You have successfully inserted a new record!');
        } else {
            return redirect()->back()->with('error', 'Invalid request!');
        }
    }


    public function login()
    {
        return view('login');
    }
    public function profile()
    {
        return view('admin.profile');
    }
}
