<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FacultyCompetency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyCompetencyController extends Controller
{
    // Singleton, pola sama seperti IdentityController: satu-satunya record selalu row pertama.

    public function index()
    {
        $data = FacultyCompetency::first();

        return view('faculty_competency.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'document_file' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('document_file')) {
            $validated['document_file'] = $request->file('document_file')
                ->store('faculty-competency', 'public');
        }

        FacultyCompetency::create($validated);

        return redirect()->route('faculty-competency.index')
            ->with('success', 'Kerangka kompetensi lulusan berhasil disimpan.');
    }

    public function update(Request $request, FacultyCompetency $facultyCompetency)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'document_file' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('document_file')) {
            if ($facultyCompetency->document_file && Storage::disk('public')->exists($facultyCompetency->document_file)) {
                Storage::disk('public')->delete($facultyCompetency->document_file);
            }
            $validated['document_file'] = $request->file('document_file')
                ->store('faculty-competency', 'public');
        }

        $facultyCompetency->update($validated);

        return redirect()->route('faculty-competency.index')
            ->with('success', 'Kerangka kompetensi lulusan berhasil diperbarui.');
    }
}