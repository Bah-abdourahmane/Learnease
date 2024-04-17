<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public-pages.home');
    }
    public function about()
    {
        return view("public-pages.about.about");
    }
    public function contact()
    {
        return view("public-pages.contact.contact");
    }

    public function forum()
    {
        return view("public-pages.forum.forum");
    }

    public function courses()
    {
        return view('public.courses.index');
    }
}
