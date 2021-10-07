<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\Nomor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function dashboard()
    {
        $memo = Memo::where('user_id',Auth::id())->count();
        $surat = Nomor::where('user_id',Auth::id())->count();
        return view('staff.dashboard',compact(['memo','surat']));
    }

    public function penomoran()
    {
        return view('staff.penomoran');
    }

    public function exportimport()
    {
        return view('staff.exportimport');
    }

    public function penomoranMemo()
    {
        return view('staff.penomoran-memo');
    }

    public function exportimportMemo()
    {
        return view('staff.exportimport-memo');
    }
}
