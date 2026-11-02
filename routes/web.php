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

Route::get('/admin/dashboard', DashboardController::class . '@index')->name('admin.dashboard');

Route::get('/admin/about', AboutController::class . '@about')->name('admin.about');

Route::get('/admin/student', StudentController::class . '@index')->name('admin.student');

Route::get('/admin/classroom', ClassroomController::class . '@index')->name('admin.classroom');

Route::get('/admin/teacher', TeacherController::class . '@index')->name('admin.teacher');
Route::get('/admin/teachers', TeacherController::class . '@index')->name('admin.teachers');

Route::get('/admin/subject', SubjectController::class . '@index')->name('admin.subject');
Route::get('/admin/subjects', SubjectController::class . '@index')->name('admin.subjects');
