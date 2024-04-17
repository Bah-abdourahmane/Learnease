<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.dashborad');
    }
    public function register()
    {
        return view('teacher.register');
    }
}
