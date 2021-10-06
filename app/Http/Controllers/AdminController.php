<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        return view('admin.dashboard',compact('users'));
    }

    public function users()
    {
        return view('admin.users');
    }
}
