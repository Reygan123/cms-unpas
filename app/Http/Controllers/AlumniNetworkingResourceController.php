<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlumniNetworkingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniNetworkingResourceController extends Controller
{
    public function index()
    {
        $alumniNetworkingResources = AlumniNetworkingResource::latest()->get();

        return view('alumni_networking_resource.index', compact('alumniNetworkingResources'));
    }

    public function create()
    {
        return view('alumni_networking_resource.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:video_sharing,komunitas_profesi',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url' => 'nullable|url',
            'bidang' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('alumni-networking-thumbnail', 'public');
        }

        AlumniNetworkingResource::create($validated);

        return redirect()->route('alumni-networking-resources.index')
            ->with('success', 'Sumber daya berhasil ditambahkan.');
    }

    public function edit(AlumniNetworkingResource $alumniNetworkingResource)
    {
        return view('alumni_networking_resource.edit', compact('alumniNetworkingResource'));
    }

    public function update(Request $request, AlumniNetworkingResource $alumniNetworkingResource)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:video_sharing,komunitas_profesi',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url' => 'nullable|url',
            'bidang' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($alumniNetworkingResource->thumbnail && Storage::disk('public')->exists($alumniNetworkingResource->thumbnail)) {
                Storage::disk('public')->delete($alumniNetworkingResource->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('alumni-networking-thumbnail', 'public');
        }

        $alumniNetworkingResource->update($validated);

        return redirect()->route('alumni-networking-resources.index')
            ->with('success', 'Sumber daya berhasil diperbarui.');
    }

    public function destroy(AlumniNetworkingResource $alumniNetworkingResource)
    {
        if ($alumniNetworkingResource->thumbnail && Storage::disk('public')->exists($alumniNetworkingResource->thumbnail)) {
            Storage::disk('public')->delete($alumniNetworkingResource->thumbnail);
        }
        $alumniNetworkingResource->delete();

        return redirect()->route('alumni-networking-resources.index')
            ->with('success', 'Sumber daya berhasil dihapus.');
    }
}