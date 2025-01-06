<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherDashboardController; // Ensure this is imported
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin role routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

// Teacher role routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('teacher.dashboard');
    });

    // Teacher dashboard route
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');

    // Teacher-specific routes
    Route::get('/teacher/courses', [CourseController::class, 'index'])->name('teacher.courses.index');
    Route::get('/teacher/courses/create', [CourseController::class, 'create'])->name('teacher.create_course');
    Route::get('/teacher/profile', [ProfileController::class, 'show'])->name('teacher.profile');
});

// Resource routes for courses
Route::resource('courses', CourseController::class);

// Enroll route for courses
Route::post('/courses/{courseId}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

// Show course details
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Authentication routes
require __DIR__ . '/auth.php';
