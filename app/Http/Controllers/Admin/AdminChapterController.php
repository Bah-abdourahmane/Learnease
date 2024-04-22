<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\ChapterFormRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminChapterController extends Controller
{
    public function index()
    {
        $chapter = Chapter::with('domain', 'instructor')->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.chapters.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::all();

        return view('admin.chapters.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChapterFormRequest $request)
    {

        Chapter::create($request->validated());

        return redirect()->route('admin.courses.index')->with('success', 'Chapter created successfully.');
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
        return view('admin.chapter.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChapterFormRequest $request, Chapter $chapter)
    {

        $chapter->update($request->validated());

        return  redirect()->route('admin.courses.index')
            ->with('success', "{$chapter->title} a bien été modifier.");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return  redirect()->route('admin.courses.index')
            ->with('success', "{$chapter->title} a bien été supprimer.");
    }
}
