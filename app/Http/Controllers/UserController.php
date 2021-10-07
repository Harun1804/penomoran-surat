<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ubahPasword()
    {
        return view('ubahpass');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|same:cpassword',
            'cpassword' => 'required|min:6|same:password',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success','Password Anda Telah Diubah');
    }
}
