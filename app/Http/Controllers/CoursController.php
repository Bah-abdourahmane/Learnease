<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursController extends Controller
{
  public function index()
  {
    $courses = Course::all();
    return view('public-pages.courses.index', ['courses' => $courses]);
  }
  // pour le ui du formulaire
  public function create(): View
  {
    return view('public-pages.courses.create');
  }
  // la logique pour la creation du cour
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nomFormation' => 'required|string|max:255',
      'level' => 'required|string|max:100',
      'description' => 'required|string',
    ]);

    $course = Course::create($validatedData);

    return redirect()->route('public-pages.courses.index')->with('success', 'Cours créé avec succès.');
  }

  public function show($id): View
  {
    return view('public-pages.courses.show');
  }
  public function tutoriel(string $id): View
  {
    return view('public-pages.courses.tutoriel', [
      'cours' => Course::findOrFail($id)
    ]);
  }
}
