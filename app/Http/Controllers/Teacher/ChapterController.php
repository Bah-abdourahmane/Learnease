<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\ChapterFormRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function index()
    {
        
        $chapter = Chapter::with('domain', 'instructor')->orderBy('updated_at', 'desc')->where("instructor_id", Auth::user()->id)->paginate(10);
        return view('teacher.chapters.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::where("instructor_id", Auth::user()->id)->get();

        return view('teacher.chapters.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChapterFormRequest $request)
    {

        Chapter::create($request->validated());

        return redirect()->route('teacher.courses.index')->with('success', 'Un nouveau chapitre ajouter.');
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
    public function edit(Chapter $chapter)
    {
        return view('teacher.chapter.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChapterFormRequest $request, Chapter $chapter)
    {

        $chapter->update($request->validated());

        return  redirect()->route('teacher.courses.index')
            ->with('success', "{$chapter->title} a été modifier avec sussès.");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return  redirect()->route('teacher.courses.index')
            ->with('success', "{$chapter->title} a été supprimer.");
    }
}
