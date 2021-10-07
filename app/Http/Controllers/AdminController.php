<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $surat = Nomor::count();
        return view('admin.dashboard',compact(['users','surat']));
    }

    public function users()
    {
        return view('admin.users');
    }

    public function restart()
    {
        return view('admin.penomoran.restart');
    }

    public function updateNoUrut(Request $request)
    {
        $noUrutAkhir = Nomor::orderBy('created_at','desc')->first();
        $noUrutAkhir->update([
            'no_urut' => $request->no_urut
        ]);

        return redirect()->back()->with('success','No Urut Berhasil Direset');
    }

    public function history()
    {
        $surat = Nomor::with('user')->orderBy('created_at','desc')->paginate(10);
        return view('admin.penomoran.history',compact('surat'));
    }

    public function ubahBgLogin()
    {
        return view('admin.ubahbg');
    }

    public function updateBackground(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048|mimes:png,jpg,jpeg'
        ]);

        if($request->file('image')){
            $path = public_path('img');
            unlink($path.'/bg-01.jpg');
            $request->image->move($path,'bg-01.jpg');
        }
        return redirect()->back()->with('success','Background Login Berhasil Diubah');
    }
}
