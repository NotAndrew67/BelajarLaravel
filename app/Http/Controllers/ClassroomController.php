<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classrooms = Classroom::withCount('students')->latest()->get();
        $totalClassrooms = $classrooms->count();
        $totalStudents = $classrooms->sum(fn ($c) => ($c->total_students && $c->total_students > 0) ? $c->total_students : $c->students_count);

        return view('admin.classroom.index', compact('classrooms', 'totalClassrooms', 'totalStudents'));
    }

    public function create(): View
    {
        return view('admin.classroom.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'total_students' => 'nullable|integer|min:0',
        ]);

        Classroom::create($validated);

        return redirect()->route('admin.classroom')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit(Classroom $classroom): View
    {
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'total_students' => 'nullable|integer|min:0',
        ]);

        $classroom->update($validated);

        return redirect()->route('admin.classroom')->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        return redirect()->route('admin.classroom')->with('success', 'Data kelas berhasil dihapus!');
    }
}
