<?php

use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminChapterController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SocialiteAuthController;
use Illuminate\Support\Facades\Route;


// les routes public
Route::controller(PublicController::class)->group(function () {
  Route::get('/',  'home');
  Route::get('/courses',  'courses')->name('courses.index');
  Route::get('/courses/{id}',  'course_details')->name('courses.show');
  Route::get('/course/tutoriel/{id}', 'tutoriel')->name('courses.tutoriel');
  Route::get('/about',  'abdout');
  Route::get('/forum',  'forum');
  Route::get('/contact',  'contact');
});

// Controller middleware pour la redirection en fonction des roles
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Administrateur routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
  Route::get('dashboard', [AdminController::class, 'dashboard'])->name('index');
  Route::get('teachers', [AdminController::class, 'teacher'])->name('teachers');
  Route::resource('users', AdminUserController::class);
  Route::resource('courses', AdminCourseController::class);
  Route::resource('chapters', AdminChapterController::class);
  Route::resource('videos', AdminVideoController::class);
});

// authentication with socialite (google,github)
Route::controller(SocialiteAuthController::class)->group(function () {
  Route::get('/oauth/{provider}/redirect', 'redirect')->name('oauth.redirect');
  Route::get('/oauth/{provider}/callback', 'authenticate');
});

// Routes user profile details 
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
