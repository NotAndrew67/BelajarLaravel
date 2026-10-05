<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = [
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

        return view('admin.student', compact('student'));
    }
}
