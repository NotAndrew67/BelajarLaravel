<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/layout', function () {
    return view('layout');
});

// Admin Dashboard & About
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/about', [AboutController::class, 'about'])->name('admin.about');

Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student');
Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students');
Route::get('/admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
Route::post('/admin/student', [StudentController::class, 'store'])->name('admin.student.store');
Route::post('/admin/students', [StudentController::class, 'store']);
Route::get('/admin/student/{student}/edit', [StudentController::class, 'edit'])->name('admin.student.edit');
Route::put('/admin/student/{student}', [StudentController::class, 'update'])->name('admin.student.update');
Route::delete('/admin/student/{student}', [StudentController::class, 'destroy'])->name('admin.student.destroy');

Route::get('/admin/classroom', [ClassroomController::class, 'index'])->name('admin.classroom');
Route::get('/admin/classrooms', [ClassroomController::class, 'index'])->name('admin.classrooms');
Route::get('/admin/classroom/create', [ClassroomController::class, 'create'])->name('admin.classroom.create');
Route::post('/admin/classroom', [ClassroomController::class, 'store'])->name('admin.classroom.store');
Route::post('/admin/classrooms', [ClassroomController::class, 'store']);
Route::get('/admin/classroom/{classroom}/edit', [ClassroomController::class, 'edit'])->name('admin.classroom.edit');
Route::put('/admin/classroom/{classroom}', [ClassroomController::class, 'update'])->name('admin.classroom.update');
Route::delete('/admin/classroom/{classroom}', [ClassroomController::class, 'destroy'])->name('admin.classroom.destroy');

Route::get('/admin/teacher', [TeacherController::class, 'index'])->name('admin.teacher');
Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers');
Route::get('/admin/teacher/create', [TeacherController::class, 'create'])->name('admin.teacher.create');
Route::post('/admin/teacher', [TeacherController::class, 'store'])->name('admin.teacher.store');
Route::post('/admin/teachers', [TeacherController::class, 'store']);
Route::get('/admin/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
Route::put('/admin/teacher/{teacher}', [TeacherController::class, 'update'])->name('admin.teacher.update');
Route::delete('/admin/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('admin.teacher.destroy');

Route::get('/admin/subject', [SubjectController::class, 'index'])->name('admin.subject');
Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects');
Route::get('/admin/subject/create', [SubjectController::class, 'create'])->name('admin.subject.create');
Route::post('/admin/subject', [SubjectController::class, 'store'])->name('admin.subject.store');
Route::post('/admin/subjects', [SubjectController::class, 'store']);
Route::get('/admin/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('admin.subject.edit');
Route::put('/admin/subject/{subject}', [SubjectController::class, 'update'])->name('admin.subject.update');
Route::delete('/admin/subject/{subject}', [SubjectController::class, 'destroy'])->name('admin.subject.destroy');

Route::redirect('/admin/student/index.blade.php', '/admin/student');
Route::redirect('/admin/classroom/index.blade.php', '/admin/classroom');
Route::redirect('/admin/teachers/index.blade.php', '/admin/teacher');
Route::redirect('/admin/teacher/index.blade.php', '/admin/teacher');
Route::redirect('/admin/subjects/index.blade.php', '/admin/subject');
Route::redirect('/admin/subject/index.blade.php', '/admin/subject');
