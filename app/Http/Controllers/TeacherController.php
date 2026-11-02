<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::all();
        $teacher = $teachers;

        return view('admin.teacher', compact('teachers', 'teacher'));
    }
}
