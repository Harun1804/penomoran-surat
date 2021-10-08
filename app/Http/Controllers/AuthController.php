<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $server = Carbon::now();
        return view('login',compact('server'));
    }

    public function verifyLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            if(Auth::user()->role == "admin"){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('staff.dashboard');
            }
        }else{
            return redirect()->back()->with('failed','Gagal Login Cek Kembali Username dan Password Anda!!!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }
}
