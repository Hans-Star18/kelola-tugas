<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('user_profil')->with('success', 'Berhasil Memperbarui Data');
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
}