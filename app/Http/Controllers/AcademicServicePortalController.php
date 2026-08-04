<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicServicePortal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicServicePortalController extends Controller
{
    public function index()
    {
        $portals = AcademicServicePortal::orderBy('urutan')->get();

        return view('academic_service_portal.index', compact('portals'));
    }

    public function create()
    {
        return view('academic_service_portal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sistem' => 'required|string|max:255',
            'alamat_url' => 'nullable|url|max:255',
            'deskripsi' => 'nullable|string',
            'fungsi' => 'nullable|string',
            'icon' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,segera_hadir',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('service-portal-icon', 'public');
        }

        AcademicServicePortal::create($validated);

        return redirect()->route('academic-service-portals.index')
            ->with('success', 'Portal layanan berhasil ditambahkan.');
    }

    public function edit(AcademicServicePortal $academicServicePortal)
    {
        return view('academic_service_portal.edit', compact('academicServicePortal'));
    }

    public function update(Request $request, AcademicServicePortal $academicServicePortal)
    {
        $validated = $request->validate([
            'nama_sistem' => 'required|string|max:255',
            'alamat_url' => 'nullable|url|max:255',
            'deskripsi' => 'nullable|string',
            'fungsi' => 'nullable|string',
            'icon' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,segera_hadir',
        ]);

        if ($request->hasFile('icon')) {
            if ($academicServicePortal->icon && Storage::disk('public')->exists($academicServicePortal->icon)) {
                Storage::disk('public')->delete($academicServicePortal->icon);
            }
            $validated['icon'] = $request->file('icon')->store('service-portal-icon', 'public');
        }

        $academicServicePortal->update($validated);

        return redirect()->route('academic-service-portals.index')
            ->with('success', 'Portal layanan berhasil diperbarui.');
    }

    public function destroy(AcademicServicePortal $academicServicePortal)
    {
        if ($academicServicePortal->icon && Storage::disk('public')->exists($academicServicePortal->icon)) {
            Storage::disk('public')->delete($academicServicePortal->icon);
        }
        $academicServicePortal->delete();

        return redirect()->route('academic-service-portals.index')
            ->with('success', 'Portal layanan berhasil dihapus.');
    }
}