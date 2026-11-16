<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with('classroom')->latest()->get();
        $student = $students;
        $classrooms = Classroom::orderBy('name')->get();

        return view('admin.student.index', compact('students', 'student', 'classrooms'));
    }

    public function create(): View
    {
        $classrooms = Classroom::orderBy('name')->get();

        return view('admin.student.create', compact('classrooms'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:50|unique:students,nis',
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string|max:500',
        ]);

        Student::create($validated);

        return redirect()->route('admin.student')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit(Student $student): View
    {
        $classrooms = Classroom::orderBy('name')->get();

        return view('admin.student.edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => [
                'required',
                'string',
                'max:50',
                Rule::unique('students', 'nis')->ignore($student->id),
            ],
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string|max:500',
        ]);

        $student->update($validated);

        return redirect()->route('admin.student')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('admin.student')->with('success', 'Data siswa berhasil dihapus!');
    }
}
