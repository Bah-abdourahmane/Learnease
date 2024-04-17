<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return to_route('admin.index');
        } elseif (Auth::user()->role === 'teacher') {
            return view('teacher.dashboard');
        } else if (Auth::user()->role === 'participant') {
            return view('participant.dashboard');
        } else return abort(401);
    }
}
