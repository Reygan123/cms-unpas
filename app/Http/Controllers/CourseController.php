<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CurriculumPeriod;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Nested di bawah CurriculumPeriod. Ditampilkan ter-grouping per semester di view.

    public function index(CurriculumPeriod $curriculumPeriod)
    {
        $courses = $curriculumPeriod->courses()
            ->orderBy('semester')
            ->orderBy('urutan')
            ->get()
            ->groupBy('semester');

        return view('course.index', compact('curriculumPeriod', 'courses'));
    }

    public function create(CurriculumPeriod $curriculumPeriod)
    {
        return view('course.create', compact('curriculumPeriod'));
    }

    public function store(Request $request, CurriculumPeriod $curriculumPeriod)
    {
        $validated = $request->validate([
            'semester' => 'required|integer|min:1|max:14',
            'kode' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:24',
            'jenis' => 'required|in:wajib,pilihan,rekognisi',
            'prasyarat' => 'nullable|string|max:20',
            'urutan' => 'nullable|integer',
        ]);
        $validated['id_curriculum_period'] = $curriculumPeriod->id;

        Course::create($validated);

        return redirect()->route('curriculum-periods.courses.index', $curriculumPeriod->id)
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit(CurriculumPeriod $curriculumPeriod, Course $course)
    {
        return view('course.edit', compact('curriculumPeriod', 'course'));
    }

    public function update(Request $request, CurriculumPeriod $curriculumPeriod, Course $course)
    {
        $validated = $request->validate([
            'semester' => 'required|integer|min:1|max:14',
            'kode' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:24',
            'jenis' => 'required|in:wajib,pilihan,rekognisi',
            'prasyarat' => 'nullable|string|max:20',
            'urutan' => 'nullable|integer',
        ]);

        $course->update($validated);

        return redirect()->route('curriculum-periods.courses.index', $curriculumPeriod->id)
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(CurriculumPeriod $curriculumPeriod, Course $course)
    {
        $course->delete();

        return redirect()->route('curriculum-periods.courses.index', $curriculumPeriod->id)
            ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}