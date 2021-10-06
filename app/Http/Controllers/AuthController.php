<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function verifyLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->username])) {
            $request->session()->regenerate();
            if(Auth::user()->role == "admin"){
                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->back()->with('failed','Gagal Login Cek Kembali Username dan Password Anda!!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }
}
