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
    public function home()
    {
        $announcements = DB::table('announcements')
        ->select('*')
        ->where('ann_active', '!=', -1)
        ->orderBy('ann_posted_date', 'desc')
        ->get();

        return view('admin.home', compact('announcements'));
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

    public function create_announcements(Request $request)
    {
        $request->validate([
            'ann_title' => 'required|string|max:255',
            'ann_content' => 'required|string',
        ]);

        DB::table('announcements')->insert([
            'ann_title' => $request->input('ann_title'),
            'ann_content' => $request->input('ann_content'),
            'ann_active' => 1,
            'ann_posted_date' => now(),
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Announcement created successfully.');
    }
    public function appointment(Request $request)
    {
        $validatedData = $request->validate([
            'app_fname' => 'required|string',
            'app_mname' => 'nullable|string',
            'app_lname' => 'required|string',
            'app_address' => 'nullable|string',
            'app_bday' => 'required|date',
            'app_gender' => 'required|string',
            'app_blood_type' => 'required|string',
            'app_height_cm' => 'required|integer',
            'app_weight_kg' => 'required|integer',
            'app_allergies' => 'nullable|string',
            'app_medications' => 'nullable|string',
            'app_medical_conditions' => 'nullable|string',
            'app_email' => 'required|email',
            'app_phone' => 'nullable|string',
            'app_contact_address' => 'nullable|string',
            'app_appointment_date' => 'required|date',
            'app_preferred_time' => 'nullable|string',
            'app_reminder_preference' => 'nullable|string',
        ]);

        $validatedData['app_active'] = 1;
        $validatedData['created_at'] = now();

        DB::table('appointments')->insert($validatedData);

        return redirect()->back()->with('success', 'Appointment created successfully!');
    }

    public function class()
    {
        $appointments = DB::table('appointments')
            ->select('*', DB::raw("CONCAT(app_fname, ' ', COALESCE(app_mname, ''), ' ', app_lname) AS full_name"))
            ->orderBy('app_id', 'asc')
            ->get();

        return view('admin.schedules', compact('appointments'));
    }

    public function manageSchedules()
    {
        $appointments = DB::table('appointments')
            ->select('*', DB::raw("CONCAT(app_fname, ' ', COALESCE(app_mname, ''), ' ', app_lname) AS full_name"))
            ->orderBy('app_id', 'asc')
            ->get();

        return view('admin.manage_schedules', compact('appointments'));
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
            ->whereDate('app_appointment_date', $currentDate)
            ->count();
        $totalClients = DB::table('clients')->count();

        $appointments = DB::table('appointments')
            ->whereDate('app_appointment_date', $currentDate)
            ->select('*', DB::raw("CONCAT(app_fname, ' ', COALESCE(app_mname, ''), ' ', app_lname) AS full_name"))
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
                    $request->session()->put('user_role', $user->user_role);

                    if ($user->user_role == 1) {
                        return redirect()->route('admin.dashboard');
                    } elseif ($user->user_role == 2) {
                        return redirect()->route('admin.home');
                    } else {
                        return back();
                    }
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
            'app_id' => 'required|integer',
            'app_fname' => 'required|string',
            'app_mname' => 'nullable|string',
            'app_lname' => 'required|string',
            'app_address' => 'nullable|string',
            'app_bday' => 'required|date',
            'app_gender' => 'required|string',
            'app_blood_type' => 'required|string',
            'app_height_cm' => 'required|integer',
            'app_weight_kg' => 'required|integer',
            'app_allergies' => 'nullable|string',
            'app_medications' => 'nullable|string',
            'app_medical_conditions' => 'nullable|string',
            'app_email' => 'required|email',
            'app_phone' => 'nullable|string',
            'app_contact_address' => 'nullable|string',
            'app_appointment_date' => 'required|date',
            'app_preferred_time' => 'nullable|string',
            'app_reminder_preference' => 'nullable|string',
            'app_active' => 'required|integer',
        ]);

        try {
            $affectedRows = DB::table('appointments')
                ->where('app_id', $validatedData['app_id'])
                ->update([
                    'app_fname' => $validatedData['app_fname'],
                    'app_mname' => $validatedData['app_mname'],
                    'app_lname' => $validatedData['app_lname'],
                    'app_address' => $validatedData['app_address'],
                    'app_bday' => $validatedData['app_bday'],
                    'app_gender' => $validatedData['app_gender'],
                    'app_blood_type' => $validatedData['app_blood_type'],
                    'app_height_cm' => $validatedData['app_height_cm'],
                    'app_weight_kg' => $validatedData['app_weight_kg'],
                    'app_allergies' => $validatedData['app_allergies'],
                    'app_medications' => $validatedData['app_medications'],
                    'app_medical_conditions' => $validatedData['app_medical_conditions'],
                    'app_email' => $validatedData['app_email'],
                    'app_phone' => $validatedData['app_phone'],
                    'app_contact_address' => $validatedData['app_contact_address'],
                    'app_appointment_date' => $validatedData['app_appointment_date'],
                    'app_preferred_time' => $validatedData['app_preferred_time'],
                    'app_reminder_preference' => $validatedData['app_reminder_preference'],
                    'app_active' => $validatedData['app_active'],
                    'updated_at' => now(),
                ]);

            if ($affectedRows === 0) {
                throw new \Exception('No appointment found with the given ID.');
            }

            return redirect()->back()->with('success', 'Appointment updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update appointment: ' . $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $app_id = $request->input('client_id');
        DB::table('clients')
            ->where('client_id', '=', $app_id)
            ->update([
                'client_active' => '-1',
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }

    public function deleteAppointment(Request $request)
    {
        $app_id = $request->input('app_id');
        DB::table('appointments')
            ->where('app_id', '=', $app_id)
            ->update([
                'app_active' => '0',
                'updatedAt' => now(),
            ]);

        return redirect()->back();
    }

    public function delete_announcements($ann_id)
    {
        DB::table('announcements')
            ->where('ann_id', $ann_id)
            ->update(['ann_active' => -1]);

        return redirect()->route('admin.home');
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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function defaultCharts()
    {
        $defaultCharts = DB::table('borrow_requests')
            ->select(
                'equipments.eqp_name',
                'borrowers.bor_id',
                DB::raw('SUM(borrow_requests.res_quantity) as total_quantity'),
                DB::raw('SUM(equipments.eqp_quantity) as totalQuantity'),
                DB::raw("CONCAT(borrowers.bor_first_name, ' (', borrowers.bor_code, ')') as borrower_name_code")
            )
            ->join('equipments', 'equipments.eqp_id', '=', 'borrow_requests.eqp_id')
            ->join('borrowers', 'borrowers.bor_id', '=', 'borrow_requests.bor_id')
            ->whereBetween('borrow_requests.res_date_requested')
            ->groupBy('equipments.eqp_name', 'borrowers.bor_id', 'borrowers.bor_first_name', 'borrowers.bor_code')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        if ($defaultCharts->isEmpty()) {
            return response()->json(['error' => 'No default data found'], 404);
        }

        $barChartData = $defaultCharts->map(function ($item) {
            return [
                'eqp_name' => $item->eqp_name,
                'total_quantity' => $item->total_quantity,
            ];
        });

        $data = [
            'default_bar_chart_data' => $barChartData,
        ];

        return response()->json($data);
    }
}
