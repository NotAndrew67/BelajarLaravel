<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;

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

Route::get('/admin/students', function () {
    $students = [
        ['nis' => '2024001', 'name' => 'Ahmad Fauzi',     'classroom' => 'X RPL 1'],
        ['nis' => '2024002', 'name' => 'Budi Santoso',    'classroom' => 'X RPL 1'],
        ['nis' => '2024003', 'name' => 'Citra Lestari',   'classroom' => 'X RPL 2'],
        ['nis' => '2024004', 'name' => 'Dewi Anggraini',  'classroom' => 'X RPL 2'],
        ['nis' => '2024005', 'name' => 'Eko Prasetyo',    'classroom' => 'XI TKJ 1'],
        ['nis' => '2024006', 'name' => 'Fitri Handayani', 'classroom' => 'XI TKJ 1'],
        ['nis' => '2024007', 'name' => 'Gilang Ramadhan', 'classroom' => 'XI TKJ 2'],
        ['nis' => '2024008', 'name' => 'Hana Permata',    'classroom' => 'XI TKJ 2'],
        ['nis' => '2024009', 'name' => 'Indra Wijaya',    'classroom' => 'XII MM 1'],
        ['nis' => '2024010', 'name' => 'Jihan Maharani',  'classroom' => 'XII MM 1'],
    ];

    return view('admin.students', compact('students'));
})->name('admin.students');
