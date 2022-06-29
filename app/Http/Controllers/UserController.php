<?php

namespace App\Http\Controllers;

use App\Mail\hansStarEmail;
use App\Models\Biodata;
use App\Models\password_reset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class data_kosong
{
    public $nama_lengkap = '';
    public $jenis_kelamin = '';
    public $tempat_lahir = '';
    public $tanggal_lahir = '';
    public $alamat = '';
    public $no_handphone = '';
    public $jenjang_pendidikan = '';
    public $jurusan = '';
}

class UserController extends Controller
{
    public function index()
    {
        $biodata = Biodata::where('user_id', Auth::user()->id)->first();

        if (!$biodata) {
            $biodata = new data_kosong();
        }

        return view('user.index', [
            'title' => 'Profile',
            'biodata' => $biodata,
        ]);
    }

    public function edit(Request $request)
    {
        Biodata::updateOrCreate(
            ['user_id' => Auth::user()->id],
            $request->all()
        );

        return redirect()->back()->with('success', 'Berhasil Memperbarui Data');
    }

    public function edit_profile()
    {
        $biodata = Biodata::where('user_id', Auth::user()->id)->first();

        if (!$biodata) {
            $biodata = new data_kosong();
        }

        return view('user.edit_profile', [
            'title' => 'Edit Profile',
            'biodata' => $biodata,
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'username' => 'required',
            'email' => 'required|email:rfc,dns',
        ];

        $validateData = $request->validate($rules);

        User::where("id", auth()->user()->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Memperbarui Data');
    }

    public function update_password()
    {
        if (Hash::check(request('password'), Auth::user()->password)) {
            $rules = [
                'password_baru' => 'required|min:8|max:16',
                'password_baru_repeat' => 'required|same:password_baru|min:8|max:16',
            ];

            $validateData = request()->validate($rules);

            $validateData['password'] = bcrypt($validateData['password_baru']);

            User::where("id", Auth::user()->id)->update(['password' => $validateData['password']]);

            return back()->with('success', 'Berhasil Memperbarui Password');
        }
        return back()->with('pass_error', 'Password Lama Salah');
    }

    public function login()
    {
        return view('user.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticated(Request $request)
    {
        $email = $request->email_username;
        $username = $request->email_username;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember) || Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Gagal masuk, coba lagi!');
    }

    public function forgot_password()
    {
        return view('user.forgot_password', [
            'title' => 'Forgot Password',
        ]);
    }

    public function reset_password()
    {
        return view('user.reset', [
            'title' => 'Reset Password',
        ]);
    }

    public function reset()
    {
        $email = request('email');
        $token = request('token');

        $user = User::where('email', $email)->first();

        if ($user) {
            $user_token = password_reset::where('token', $token)->first();

            if ($user_token) {
                $rules = [
                    'password_baru' => 'required|min:8|max:16',
                    'password_baru_repeat' => 'required|same:password_baru|min:8|max:16',
                ];

                $validateData = request()->validate($rules);

                $validateData['password'] = bcrypt($validateData['password_baru']);

                User::where("email", $email)->update(['password' => $validateData['password']]);

                return redirect()->route('login')->with('success', 'Berhasil Mengubah Password, Silahkan Login');
            } else {
                return redirect()->route('login')->with('loginError', 'Token Salah');
            }
        } else {
            return redirect()->route('login')->with('loginError', 'Email Salah');
        }
    }

    public function registrasi()
    {
        return view('user.register', [
            'title' => 'Register',
        ]);
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8|max:16',
            'repeat_password' => 'required|same:password|min:8|max:16',
        ];

        $validateData = $request->validate($rules);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/user/login')->with('success', 'Berhasil mendaftar, silahkan login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }

    public function send_mail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $token = $request->token;
            $user_token = [
                'email' => $email,
                'token' => $token,
            ];

            Password_reset::create($user_token);
            Mail::to($email)->send(new hansStarEmail());

            return redirect()->back()->with('success', 'Link untuk reset password sudah terkirim, silahkan cek email anda');
        } else {
            return redirect()->back()->with('error_email', 'Email tidak ditemukan');
        }

    }
}