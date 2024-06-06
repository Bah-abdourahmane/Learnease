<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AdminFormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->where("role", "teacher")->paginate(10);
        return view('admin.teachers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'max:18'],
            'role' => ['required'],
            'isAccepted' => ['required', 'boolean'],
        ]);
        // dd($validatedData);

        $user = User::create($validatedData);

        return redirect()->route('admin.teachers.index')
            ->withSuccess("Formateur crée avec succès.");
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
    public function edit(User $teacher)
    {
        return view('admin.teachers.edit', compact("teacher"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'max:18'],
            'isAccepted' => ['required', 'boolean'],
        ]);
        // dd($validatedData);
        $teacher->update($validatedData);
        return redirect()->route('admin.teachers.index')
            ->withSuccess("Formateur modifier avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')
            ->withSuccess("Formateur supprimer avec succès.");
    }
}
