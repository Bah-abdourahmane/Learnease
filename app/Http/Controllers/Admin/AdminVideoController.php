<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formation\VideoFormRequest;
use App\Models\Chapter;
use App\Models\Video;
use Illuminate\Http\Request;

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
        Video::create($request->validated());

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
