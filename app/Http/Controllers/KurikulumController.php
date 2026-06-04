<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Prospek;
use App\Models\Kurikulum;
use App\Models\Departement;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kurikulums = Kurikulum::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('kurikulum.index', compact('kurikulums', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('kurikulum.create', compact('departements'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'home' => 'nullable|string',
        ]);

        // Simpan gambar jika diupload
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('kurikulums', 'public') : null;
        $iconPath = $request->hasFile('icon') ? $request->file('icon')->store('kurikulums', 'public') : null;

        // Simpan data ke database
        Kurikulum::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'icon' => $iconPath,
            'home' => $request->home,
        ]);

        return redirect()->route('kurikulum.index')->with('success', "Data berhasil dibuat!");
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departements = Departement::all();
        $kurikulum = Kurikulum::findOrFail($id);
        return view('kurikulum.edit', compact('departements', 'kurikulum'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'home' => 'nullable|string',
        ]);

        // Jika ada gambar baru, simpan dan hapus gambar lama
        if ($request->hasFile('image')) {
            if ($kurikulum->image && Storage::disk('public')->exists($kurikulum->image)) {
                Storage::disk('public')->delete($kurikulum->image);
            }

            $imagePath = $request->file('image')->store('kurikulums', 'public');
            $kurikulum->image = $imagePath;
        }
        if ($request->hasFile('icon')) {
            if ($kurikulum->icon && Storage::disk('public')->exists($kurikulum->icon)) {
                Storage::disk('public')->delete($kurikulum->icon);
            }

            $iconPath = $request->file('icon')->store('kurikulums', 'public');
            $kurikulum->icon = $iconPath;
        }

        $kurikulum->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
        ]);

        return redirect()->route('kurikulum.index')->with('success', "Data Berhasil Diperbaharui!");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($kurikulum->image && Storage::disk('public')->exists($kurikulum->image)) {
            Storage::disk('public')->delete($kurikulum->image);
        }
        if ($kurikulum->icon && Storage::disk('public')->exists($kurikulum->icon)) {
            Storage::disk('public')->delete($kurikulum->icon);
        }

        $kurikulum->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
