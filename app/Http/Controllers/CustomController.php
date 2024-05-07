<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Validation\ValidationException;

class CustomController extends Controller
{
    //View Functions
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

    public function manage()
    {
        return view('admin.manage');
    }

    public function appointment(Request $request)
    {
        $validatedData = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_reason' => 'required|string|max:255',
            'app_user' => 'required|string|max:255',
            'app_services' => 'nullable|string|max:255',
            'app_startAt' => 'required|date',
            'app_endAt' => 'required|date',
        ]);

        DB::table('appointments')->insert([
            'app_name' => $validatedData['app_name'],
            'app_reason' => $validatedData['app_reason'],
            'app_user' => $validatedData['app_user'],
            'app_services' => $validatedData['app_services'],
            'app_startAt' => $validatedData['app_startAt'],
            'app_endAt' => $validatedData['app_endAt'],
            'createdAt' => now(),
            'updatedAt' => now(),
            'app_active' => 1,
        ]);

        return redirect()->back();
    }

    public function class()
    {
        $appointments = DB::table('appointments')
            ->orderBy('app_id', 'asc')
            ->where('app_active', 1)
            ->get();

        return view('admin.schedules', compact('appointments'));
    }


    public function clients()
    {
        $clients = DB::table('clients')
            ->orderBy('client_id', 'asc')
            ->get();

        return view('admin.clients', compact('clients'));
    }

    public function users()
    {
        $users = DB::table('users')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.users', compact('users'));
    }

    public function main()
    {
        $currentDate = now()->format('Y-m-d');
        $totalUsers = DB::table('users')
            ->where('id', session('id'))
            ->where('user_role', 1)
            ->count();
        $totalAppointments = DB::table('appointments')
            ->whereDate('app_startAt', $currentDate)
            ->count();
        $totalClients = DB::table('clients')->count();

        $appointments = DB::table('appointments')
            ->whereDate('app_startAt', $currentDate)
            ->orderBy('app_id', 'asc')
            ->get();

        return view('admin.dashboard', compact('appointments', 'totalUsers', 'totalAppointments','totalClients'));
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
                'user_role' => $request->input('user_role'),
                'user_is_active' => 1,
                'user_created_at' => now(),
            ]);

            $request->session()->put('id', $user_id);
            $request->session()->put('user_images', $imagePath);
            $request->session()->put('user_fname', $request->input('user_fname'));
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('user_role',$request->input('user_role'));

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


    //Update Functions
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
            'app_id' => 'required|exists:clients,app_id',
            'app_name' => 'required|string|max:255',
            'app_reason' => 'required|string|max:255',
            'app_services' => 'nullable|string|max:255',
            'app_startAt' => 'required|date',
            'app_endAt' => 'required|date',
        ]);

        DB::table('appointments')
            ->where('app_id', $validatedData['app_id'])
            ->update([
                'app_name' => $validatedData['app_name'],
                'app_reason' => $validatedData['app_reason'],
                'app_user' => $request->session()->get('user_fname'),
                'app_services' => $validatedData['app_services'],
                'app_startAt' => $validatedData['app_startAt'],
                'app_endAt' => $validatedData['app_endAt'],
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }


    //Remove-Delete functions
    public function delete(Request $request)
    {
        $app_id = $request->input('app_id');
        DB::table('clients')
            ->where('app_id', '=', $app_id)
            ->update([
                'app_active' => '-1',
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $user = $request->input('id');
        DB::table('users')
            ->where('id', '=', $user)
            ->update([
                'user_is_active' => '-1',
                'user_update_at' => now(),
            ]);

        return redirect()->back();
    }


    //Logout Functions
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
