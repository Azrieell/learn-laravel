<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GuruAccessController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('auth.guru.login', compact('guru'));

    }

    public function register(){
        $guru = Guru::all();
        return view('auth.guru.register', compact('guru'));
    }

    public function postRegister(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = 'Guru';
        $user->save();

        return redirect('/login/guru')->with('success', 'Register berhasil. silahkan login');
    }

    public function postLogin(Request $request)
    {
        // Validasi data request
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // Cek kredensial login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect('/guru')->with('success', 'Login berhasil.');
        }

        // Login gagal
        return redirect()->back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ]);
    }

}
