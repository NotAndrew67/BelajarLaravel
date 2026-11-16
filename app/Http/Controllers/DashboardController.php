<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard Overview',
            'content' => 'Selamat datang di panel administrasi sekolah. Kelola seluruh data melalui sidebar.',
        ]);
    }
}
