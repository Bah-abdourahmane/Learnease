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
            return to_route('teacher.index');
        } else if (Auth::user()->role === 'participant') {
            return to_route('participant.index');
        } else return abort(401);
    }
}
