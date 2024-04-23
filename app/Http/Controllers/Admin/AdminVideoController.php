<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\VideoFormRequest;
use App\Models\Chapter;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapters = Chapter::all();
        return view('admin.videos.create', compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoFormRequest $request)
    {
        Video::create($this->customCreateAndUpdateData($request, new Video()));
        return redirect()->route('admin.courses.index')->with('success', 'Video created successfully.');
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
    public function edit(Video $video)
    {
        $chapters = Chapter::all();
        return view('admin.videos.edit', compact('chapters', 'video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoFormRequest $request, Video $video)
    {
        $video->update($this->extractData($request, $video));

        return  redirect()->route('admin.courses.index')
            ->with('success', "{$video->title} a bien été modifier.");
    }

    private function customCreateAndUpdateData(VideoFormRequest $request, Video $video): array
    {
        $validatedData = $request->validated();
        /**@var UploadedFile|null $videoURI*/
        $videoURI = $request->validated('url');
        if ($videoURI === null || $videoURI->getError()) {
            return  $validatedData;
        }
        if ($video->url) {
            Storage::disk('public')->delete($video->url);
        }
        $validatedData['url'] = $videoURI->store('course_videos', 'public');
        return  $validatedData;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return  redirect()->route('admin.courses.index')
            ->with('success', "{$video->title} a bien été supprimer.");
    }
}
