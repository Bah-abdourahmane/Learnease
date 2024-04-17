<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function teacher()
    {
        return view('admin.dashboard');
    }
    public function participants()
    {
        return view('admin.dashboard');
    }
    public function courses()
    {
        return view('admin.dashboard');
    }
}
