<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomController extends Controller
{
    public function appointment(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_reason' => 'required|string|max:255',
            'client_user' => 'required|string|max:255',
            'client_services' => 'nullable|string|max:255',
            'client_startAt' => 'required|date',
            'client_endAt' => 'required|date',
        ]);

        DB::table('clients')->insert([
            'client_name' => $validatedData['client_name'],
            'client_reason' => $validatedData['client_reason'],
            'client_user' => $validatedData['client_user'],
            'client_services' => $validatedData['client_services'],
            'client_startAt' => $validatedData['client_startAt'],
            'client_endAt' => $validatedData['client_endAt'],
            'createdAt' => now(),
            'updatedAt' => now(),
            'client_active' => 1,
        ]);

        return redirect()->back();
    }

    public function class()
    {
        $clients = DB::table('clients')
            ->orderBy('client_id', 'asc')
            ->where('client_active', 1)
            ->get();

        return view('admin.schedules', compact('clients'));
    }


    public function manage()
    {
        return view('admin.manage');
    }

    public function main()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function login()
    {
        return view('login');
    }

    public function viewregistration()
    {
        return view('register');
    }

    public function add_register(Request $request)
    {
        if ($request->has('submit')) {
            $email = $request->input('email');
            $existingUser = DB::table('users')
                ->where('email', $email)
                ->first();

            if ($existingUser) {
                return redirect()->back()->with('error', 'Email you input was already exist. Please try another one!');
            }

            $imagePath = $request->hasFile('image') ? $request->file('image')->store('assets/images/') : 'default.png';

            $user_id = DB::table('users')->insertGetId([
                'user_fname' => $request->input('user_fname'),
                'user_bday' => $request->input('user_bday'),
                'user_phone' => $request->input('user_phone'),
                'user_gender' => $request->input('user_gender'),
                'email' => $email,
                'password' => bcrypt($request->input('password')),
                'user_address' => $request->input('user_address'),
                'user_nationality' => $request->input('user_nationality'),
                'user_province' => $request->input('user_province'),
                'user_district' => $request->input('user_district'),
                'user_blockno' => $request->input('user_blockno'),
                'user_lotno' => $request->input('user_lotno'),
                'user_images' => $imagePath,
                'user_is_active' => 1,
                'user_created_at' => now(),
            ]);

            DB::table('family_details')->insert([
                'id' => $user_id,
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
            $request->session()->put('id', $user_id);
            $request->session()->put('user_images', $imagePath);
            $request->session()->put('user_fname', $request->input('user_fname'));
            $request->session()->put('email', $request->input('email'));

            return redirect()->route('login');
        } else {
            return redirect()->back()->with('error', 'Invalid request!');
        }
    }

    public function LoginUser(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = DB::table('users')
            ->where('email', '=', $email)
            ->first();

        if ($user) {
            if ($user->user_is_active == -1) {
                $request->session()->flash('error', 'Your account is deleted. Please create account again!');
                return back();
            } elseif ($user->user_is_active == 1) {
                if (Hash::check($password, $user->password))  {
                    $request->session()->put('user_images', $user->user_images);
                    $request->session()->put('user_fname', $user->user_fname);
                    $request->session()->put('email', $user->email);
                    $request->session()->put('user', $user);

                    return redirect('admin.dashboard');
                } else {
                    $request->session()->flash('error', 'Wrong username or password');
                    return back();
                }
            } else {
                $request->session()->flash('error', 'Your account is disabled. Please contact support.');
                return back();
            }
        } else {
            $request->session()->flash('error', 'Wrong username or password');
            return back();
        }
    }

    public function updateInfo(Request $request)
    {
        $request->validate([
            'user_images' => 'required|image|mimes:jpeg,png|max:5360',
        ]);

        $fname = session('user_fname');
        $users = DB::table('users')->where('user_fname', $fname)->first();

        $files = $request->file('user_images');
        $oldFileName = $users->user_images;

        if ($request->hasFile('user_images')) {
            $file = $request->file('user_images');
            $fileName = $file->getClientOriginalName();
            Storage::disk('local')->put('images/' . $fileName, file_get_contents($file));

            if (!empty($oldFileName) && Storage::disk('local')->exists('images/' . $oldFileName)) {
                $newFileName = time() . '_' . $oldFileName;
                Storage::disk('local')->move('images/' . $oldFileName, 'images/' . $newFileName);
            }

            $users->user_images = $fileName;
        }

        $updateInfo = DB::table('users')
            ->where('user_fname', $fname)
            ->update([
                'user_images' => $fileName,
            ]);

        if ($updateInfo !== false) {
            session()->put('user_images', $fileName);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Failed to update user information.');
        }
    }

    public function updateAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'client_name' => 'required|string|max:255',
            'client_reason' => 'required|string|max:255',
            'client_services' => 'nullable|string|max:255',
            'client_startAt' => 'required|date',
            'client_endAt' => 'required|date',
        ]);

        DB::table('clients')
            ->where('client_id', $validatedData['client_id'])
            ->update([
                'client_name' => $validatedData['client_name'],
                'client_reason' => $validatedData['client_reason'],
                'client_user' => $request->session()->get('user_fname'),
                'client_services' => $validatedData['client_services'],
                'client_startAt' => $validatedData['client_startAt'],
                'client_endAt' => $validatedData['client_endAt'],
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $client_id = $request->input('client_id');
        DB::table('clients')
            ->where('client_id', '=', $client_id)
            ->update([
                'client_active' => '-1',
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
