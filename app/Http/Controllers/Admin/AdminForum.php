<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class AdminForum extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::with('comments')->get();
        return view('admin.forum.index', compact("forums"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forums = Forum::all();
        return view('admin.forum.create', compact("forums"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Forum::create($request->validate([
            'title' => 'required|string',
            'content' => 'required|string|min:30',
        ]));

        return redirect()->route('admin.forums.index')->with('success', 'New Message Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $forum = Forum::with('comments')->findOrFail($id);
        return view('admin.forum.show', compact("forum"));
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
