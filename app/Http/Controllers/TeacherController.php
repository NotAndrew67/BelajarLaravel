<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::with('subject')->latest()->get();
        $teacher = $teachers;
        $subjects = Subject::orderBy('name')->get();

        return view('admin.teacher.index', compact('teachers', 'teacher', 'subjects'));
    }

    public function create(): View
    {
        $subjects = Subject::orderBy('name')->get();

        return view('admin.teacher.create', compact('subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|numeric|digits:10|unique:teachers,niy',
            'subject_id' => 'nullable|exists:subjects,id',
            'start_date' => 'required|date',
        ]);

        Teacher::create($validated);

        return redirect()->route('admin.teacher')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(Teacher $teacher): View
    {
        $subjects = Subject::orderBy('name')->get();

        return view('admin.teacher.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, Teacher $teacher): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('teachers', 'niy')->ignore($teacher->id),
            ],
            'subject_id' => 'nullable|exists:subjects,id',
            'start_date' => 'required|date',
        ]);

        $teacher->update($validated);

        return redirect()->route('admin.teacher')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->delete();

        return redirect()->route('admin.teacher')->with('success', 'Data guru berhasil dihapus!');
    }
}
