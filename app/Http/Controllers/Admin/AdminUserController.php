<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
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
        return redirect()->route('admin.users.index')
            ->withSuccess("L'Utilisateur a bien été creér.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('admin.users.index')
            ->withSuccess("L'Utilisateur a bien été modifier.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('admin.users.index')
            ->withSuccess("L'Utilisateur a bien été supprimer.");
    }
}
