<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\CourseFormRequest;
use App\Models\Course;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('domain', 'instructor')->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domains = Domain::all();
        $course = new Course();
        return view('admin.courses.create', compact('domains', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseFormRequest $request)
    {

        Course::create($this->extractData($request, new Course()));

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $domains = Domain::all();
        return view('admin.courses.edit', compact('domains', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseFormRequest $request, Course $course)
    {
        $course->update($this->extractData($request, $course));

        return  redirect()->route('admin.courses.index')
            ->with('success', "{$course->title} a bien été modifier.");
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
        return  redirect()->route('admin.courses.index')
            ->with('success', "{$course->title} a bien été supprimer.");
    }
}
