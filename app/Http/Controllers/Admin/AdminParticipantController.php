<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AdminParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->where("role", "participant")->paginate(10);
        return view('admin.participants.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.participants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'phone' => 'required|string|min:9',
            'role' => 'required|string',
            'password' => ['required', Rules\Password::defaults()],
        ]);
        // dd($validatedUser);
        $user = User::create($validatedUser);
        return redirect()->route('admin.participants.index')
            ->withSuccess("Le participant a été creér avec succès.");
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
    public function edit(User $participant)
    {
        return view('admin.participants.edit', compact("participant"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $participant)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'phone' => 'required|string|min:9',
            'role' => 'required|string',
            // 'password' => ['required', Rules\Password::defaults()],
        ]);
        // dd($validatedUser);
        $participant->update($validatedUser);
        return redirect()->route('admin.participants.index')
            ->withSuccess("Le participant a été modifier avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.participants.index')
            ->withSuccess("Le participant a été supprimer.");
    }
}
