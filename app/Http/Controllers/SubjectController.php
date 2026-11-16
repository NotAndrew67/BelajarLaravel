<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::with('teacher')->latest()->get();
        $teachers = Teacher::orderBy('name')->get();
        $subject = $subjects;

        return view('admin.subject.index', compact('subjects', 'subject', 'teachers'));
    }

    public function create(): View
    {
        $teachers = Teacher::orderBy('name')->get();

        return view('admin.subject.create', compact('teachers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        $subject = Subject::create([
            'name' => $validated['name'],
        ]);

        if (!empty($validated['teacher_id'])) {
            // Relasikan 1:1, pastikan mapel ini hanya dipegang 1 guru
            Teacher::where('subject_id', $subject->id)->update(['subject_id' => null]);
            Teacher::where('id', $validated['teacher_id'])->update(['subject_id' => $subject->id]);
        }

        return redirect()->route('admin.subject')->with('success', 'Data mata pelajaran berhasil ditambahkan!');
    }

    public function edit(Subject $subject): View
    {
        $teachers = Teacher::orderBy('name')->get();

        return view('admin.subject.edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        $subject->update([
            'name' => $validated['name'],
        ]);

        // Reset relasi guru lama untuk mapel ini
        Teacher::where('subject_id', $subject->id)->update(['subject_id' => null]);

        // Pasangkan ke guru baru jika dipilih
        if (!empty($validated['teacher_id'])) {
            Teacher::where('id', $validated['teacher_id'])->update(['subject_id' => $subject->id]);
        }

        return redirect()->route('admin.subject')->with('success', 'Data mata pelajaran berhasil diperbarui!');
    }

    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()->route('admin.subject')->with('success', 'Data mata pelajaran berhasil dihapus!');
    }
}
