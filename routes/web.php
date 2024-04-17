<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['auth'])->get('/home', [HomeController::class, 'index']);

// les routes public
Route::get('/', function () {
  $courses = json_decode('{
        "courses": [
          {
            "id": 1,
            "title": "Introduction to Programming",
            "description": "Learn the basics of programming concepts and principles.",
            "category": "Programming",
            "level": "Beginner",
            "videos": [
              {
                "id": 1,
                "title": "Variables and Data Types",
                "url": "https://www.example.com/videos/variables_data_types.mp4"
              },
              {
                "id": 2,
                "title": "Control Structures",
                "url": "https://www.example.com/videos/control_structures.mp4"
              }
            ]
          },
          {
            "id": 2,
            "title": "Web Development Fundamentals",
            "description": "Explore the basics of web development including HTML, CSS, and JavaScript.",
            "category": "Web Development",
            "level": "Beginner",
            "videos": [
              {
                "id": 3,
                "title": "HTML Basics",
                "url": "https://www.example.com/videos/html_basics.mp4"
              },
              {
                "id": 4,
                "title": "CSS Styling",
                "url": "https://www.example.com/videos/css_styling.mp4"
              },
              {
                "id": 5,
                "title": "JavaScript Fundamentals",
                "url": "https://www.example.com/videos/js_fundamentals.mp4"
              }
            ]
          },
          {
            "id": 3,
            "title": "Machine Learning Basics",
            "description": "An introduction to machine learning concepts and algorithms.",
            "category": "Data Science",
            "level": "Intermediate",
            "videos": [
              {
                "id": 6,
                "title": "Introduction to ML",
                "url": "https://www.example.com/videos/intro_to_ml.mp4"
              },
              {
                "id": 7,
                "title": "Linear Regression",
                "url": "https://www.example.com/videos/linear_regression.mp4"
              }
            ]
          }
        ]
      }
      
    ')->courses;

  return view('welcome', compact("courses"));
});

Route::controller(PublicController::class)->group(function () {
  Route::get('/courses', 'courses');
  Route::get('/about', 'about');
  Route::get('/forum', 'forum');
  Route::get('/contact', 'contact');
});
Route::name('courses.')->group(function () {
  Route::get('/courses', [CoursController::class, 'index'])->name('index');
  Route::get('/create', [CoursController::class, 'create'])->name('create');
  Route::get('/course/{id}', [CoursController::class, 'show'])->name('show');
  // Route::get('/course/details', [CoursController::class, 'show'])->name('show');
  Route::get('/course/tutoriel/{id}', [CoursController::class, 'tutoriel'])->name('tutoriel');
});

// Routes pour les tableaux de bord
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('index');
  Route::get('/teachers', [AdminController::class, 'teacher'])->name('teachers');
  Route::get('/users', [AdminController::class, 'participants'])->name('students');
  Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
});


// Route::middleware(['auth'])->group(function () {
//   Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//   Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
//   Route::get('participant/dashboard', [ParticipantController::class, 'index'])->name('participant.dashboard');
// });


// Route  for media authentication with socialite
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
