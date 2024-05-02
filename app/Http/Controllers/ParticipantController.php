<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function dashboard()
    {
        return view('participant.dashboard');
    }
    // COURSES CONTROLLER
    public function courses()
    {
        $courses = Course::orderBy('updated_at', 'desc')->paginate(5);
        return view('participant.courses.index', compact("courses"));
    }
    public function course_details($id)
    {
        $course = Course::with('chapters.videos')->find($id);
        return view('participant.courses.show', compact("course"));
    }
    public function course_tutoriel($id)
    {
        $course = Course::findOrFail($id);
        return view('participant.courses.tutoriel', compact("course"));
    }
    public function video_playlist($courseID, $videoID, Request $request)
    {
        $autoplay = $request->has('autoplay');
        // dd($request); 
        $course = Course::with('chapters.videos')->find($courseID);
        $currentVideo = Video::findOrFail($videoID);
        return view('participant.courses.video-playlist', compact("course", "currentVideo"));
    }
}
