<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;

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
