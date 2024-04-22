<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $courses =  Course::with('domain')->orderBy('updated_at', 'desc')->limit(6)->get();
        return view('public-pages.home', compact('courses'));
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
        $courses = Course::orderBy('updated_at', 'desc')->paginate(10);
        return view('public-pages.courses.index', compact("courses"));
    }
    public function course_details($id)
    {
        $course = Course::findOrFail($id);
        return view('public-pages.courses.show', compact("course"));
    }
    public function course_tutoriel($id)
    {
        $course = Course::findOrFail($id);
        return view('public-pages.courses.tutoriel', compact("course"));
    }
}
