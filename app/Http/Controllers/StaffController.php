<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function penomoran()
    {
        return view('staff.penomoran');
    }

    public function exportimport()
    {
        return view('staff.exportimport');
    }
}
