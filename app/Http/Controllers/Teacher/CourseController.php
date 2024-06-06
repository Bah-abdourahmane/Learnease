<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\CourseFormRequest;
use App\Models\Course;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('domain', 'instructor', 'chapters')->orderBy('updated_at', 'desc')->where("instructor_id", Auth::user()->id)->paginate(6);
        return view('teacher.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domains = Domain::all();
        $course = new Course();
        return view('teacher.courses.create', compact('domains', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseFormRequest $request)
    {

        Course::create($this->extractData($request, new Course()));

        return redirect()->route('teacher.courses.index')->with('success', 'La formation a été crée avec sussès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::with('chapters.videos', 'instructor')->findOrFail($id);
        // $currentVideo = $course->chapters?->first()->videos?->first();
        // dd($currentVideo);
        return view('teacher.courses.show', compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $domains = Domain::all();
        return view('teacher.courses.edit', compact('domains', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseFormRequest $request, Course $course)
    {
        $course->update($this->extractData($request, $course));

        return  redirect()->route('teacher.courses.index')
            ->with('success', "{$course->title} a été modifier avec sussès.");
    }

    private function extractData(CourseFormRequest $request, Course $course): array
    {
        $validatedData = $request->validated();
        if (!$course->instructor_id) {
            $user = auth()->user()->id;
            $validatedData['instructor_id'] = $user;
        }

        /**@var UploadedFile|null $image*/
        $image = $request->validated('cover_photo');
        if ($image === null || $image->getError()) {
            return  $validatedData;
        }
        if ($course->cover_photo) {
            Storage::disk('public')->delete($course->cover_photo);
        }
        $validatedData['cover_photo'] = $image->store('course', 'public');
        return  $validatedData;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return  redirect()->route('teacher.courses.index')
            ->with('success', "{$course->title} a été supprimer avec sussès.");
    }
}
