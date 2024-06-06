<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Forum;
use App\Models\User;
use App\Models\Video;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // HOME PAGE CONTROLLER
    public function home(Request $request)
    {
        $courses =  Course::with('domain')->where('is_approved', true)->orderBy('updated_at', 'desc')->limit(6)->get();

        $nomCoursRecherche = $request->input('search_course_in_home_page');
        $coursRecherches = [];
        if ($nomCoursRecherche) {
            $coursRecherches = Course::where('title', 'LIKE', '%' . $nomCoursRecherche . '%')->where('is_approved', true)->orderBy('created_at', 'desc')->get();
        }

        return view('public-pages.home', compact('courses', 'coursRecherches', 'nomCoursRecherche'));
    }
    // =================================================

    public function about()
    {
        return view("public-pages.about.about");
    }

    // CONTACT CONTROLLER
    public function contact()
    {
        return view("public-pages.contact.contact");
    }
    public function contact_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        Contact::create($validatedData);

        return redirect()->route('contact.index')->with('success', 'Votre demande a été envoyée');
    }
    // ===================================================

    // FORUMS CONTROLLER
    public function forum()
    {
        $forums = Forum::with('comments')->get();
        return view("public-pages.forum.index", compact("forums"));
    }
    public function forum_detail($id)
    {
        $forum = Forum::with('comments')->findOrFail($id);
        // dd($forum);
        return view("public-pages.forum.show", compact("forum"));
    }
    // =================================================

    // Instructor Register
    public function register_instructor()
    {
        return view("public-pages.register-instructor");
    }
    public function register_instructor_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'unique:' . User::class, 'max:13'],
            'role' => ['required'],
            'isAccepted' => ['required'],
        ]);
        // dd($validatedData);
        $user = User::create($validatedData);
        // dd($user);
        return redirect()->route("home.index")->with('success', 'Votre demande pour devenir formateur a bien été envoyée.');
    }
    // ==================================================

    // COURSES CONTROLLER
    public function courses(Request $request)
    {
        // liste de tous les courses
        $courses = Course::with('chapters')->where('is_approved', true)->orderBy('updated_at', 'desc')->paginate(10);

        // Rechercher par nom de cours
        $nomCoursRecherche = $request->input('searchcourse');
        // initialisation du tableau de cours trouvee
        $coursRecherches = [];
        if ($nomCoursRecherche) {
            $coursRecherches = Course::where('title', 'LIKE', '%' . $nomCoursRecherche . '%')->where('is_approved', true)->orderBy('created_at', 'desc')->get();
        }
        // dd($coursRecherches);
        return view('public-pages.courses.index', compact("courses", "coursRecherches", "nomCoursRecherche"));
    }
    public function course_details($id)
    {
        $course = Course::with('chapters.videos')->findOrFail($id);
        return view('public-pages.courses.show', compact("course"));
    }
    public function course_tutoriel($id)
    {
        $course = Course::findOrFail($id);
        return view('public-pages.courses.tutoriel', compact("course"));
    }
    public function video_playlist($courseID, $videoID, Request $request)
    {
        // dd($request); 
        $course = Course::with('chapters.videos')->find($courseID);
        $currentVideo = Video::findOrFail($videoID);
        return view('public-pages.courses.video-playlist', compact("course", "currentVideo"));
    }
    // ====================================================
}
