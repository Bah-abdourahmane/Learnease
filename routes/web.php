<?php

use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminChapterController;
use App\Http\Controllers\Admin\AdminFormateurController;
use App\Http\Controllers\Admin\AdminForum;
use App\Http\Controllers\Admin\AdminParticipantController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\Teacher\ChapterController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\VideoController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


// les routes public
Route::controller(PublicController::class)->group(function () {
  Route::get('/',  'home')->name("home.index");
  Route::get('/courses',  'courses')->name('courses.index');
  Route::get('/courses/{id}',  'course_details')->name('courses.show');
  Route::get('/courses/{coursID}/{videoID}', 'video_playlist')->middleware('auth')->where(['coursID' => '[0-9]+', 'videoID' => '[0-9]+'])->name('courses.videos');
  Route::get('/about',  'about')->name('about.index');
  Route::get('/forum',  'forum')->name('forum.index');
  Route::get('/forum/{id}',  'forum_detail')->name('forum.show');
  Route::get('/contact',  'contact')->name('contact.index');
  Route::post('/contact',  'contact_store')->name('contact.store');
  Route::get('/instructor/register',  'register_instructor')->name('instructor.registration.form');
  Route::post('/instructor/register',  'register_instructor_store')->name('instructor.register');
});

// Controller middleware pour la redirection en fonction des roles
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Administrateur routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
  Route::get('dashboard', [AdminController::class, 'dashboard'])->name('index');
  Route::get('teachers', [AdminController::class, 'teacher'])->name('teachers');
  Route::resource('teachers', AdminFormateurController::class);
  Route::resource('participants', AdminParticipantController::class);
  Route::resource('users', AdminUserController::class);
  Route::resource('courses', AdminCourseController::class);
  Route::patch('/courses/{id}/update-status', [AdminCourseController::class, 'updateStatus'])->name('courses.updateStatus');
  Route::resource('chapters', AdminChapterController::class);
  Route::resource('videos', AdminVideoController::class);
  Route::resource('forums', AdminForum::class);
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Participant routes
Route::controller(ParticipantController::class)->prefix('participant')->middleware('participant')->name('participant.')->group(function () {
  Route::get('dashboard', 'dashboard')->name('index');
  Route::get('/courses',  'courses')->name('courses');
  Route::get('/courses/{id}', 'course_details')->name('courses.show');
  Route::get('/course/tutoriel/{id}', 'tutoriel')->name('courses.tutoriel');
  Route::get('/courses/{coursID}/{videoID}', 'video_playlist')->where(['coursID' => '[0-9]+', 'videoID' => '[0-9]+'])->name('courses.videos');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Formateur routes
Route::controller(TeacherController::class)->prefix('teacher')->middleware('teacher')->name('teacher.')->group(function () {
  Route::get('dashboard', 'dashboard')->name('index');
  Route::resource('courses', CourseController::class);
  Route::resource('chapters', ChapterController::class);
  Route::resource('videos', VideoController::class);
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  // Route::get('/courses',  'courses')->name('courses');
  // Route::get('/courses/{id}',  'course_details')->name('courses.show');
  // Route::get('/course/tutoriel/{id}', 'tutoriel')->name('courses.tutoriel');
  // Route::get('/courses/{coursID}/{videoID}', 'video_playlist')->where(['videoID' => '[0-9]+', 'videoID' => '[0-9]+'])->name('courses.videos');
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
