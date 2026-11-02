<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::all();
        $subject = $subjects;

        return view('admin.subject', compact('subjects', 'subject'));
    }
}
