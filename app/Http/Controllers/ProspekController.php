<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Prospek;
use App\Models\Departement;

class ProspekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $prospeks = Prospek::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('prospek.index', compact('prospeks', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('prospek.create', compact('departements'));
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

        // Simpan gambar jika ada
        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('prospeks', 'public') 
            : null;

        $iconPath = $request->hasFile('icon') 
            ? $request->file('icon')->store('prospeks', 'public') 
            : null;

        // Simpan data ke database
        Prospek::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'icon' => $iconPath,
            'home' => $request->home,
        ]);

        return redirect()->route('prospek.index')->with('success', "Data berhasil dibuat!");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departements = Departement::all();
        $prospek = Prospek::findOrFail($id);
        return view('prospek.edit', compact('departements', 'prospek'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prospek = Prospek::findOrFail($id);

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
            if ($prospek->image && Storage::disk('public')->exists($prospek->image)) {
                Storage::disk('public')->delete($prospek->image);
            }

            $imagePath = $request->file('image')->store('prospeks', 'public');
            $prospek->image = $imagePath;
        }
        if ($request->hasFile('icon')) {
            if ($prospek->icon && Storage::disk('public')->exists($prospek->icon)) {
                Storage::disk('public')->delete($prospek->icon);
            }

            $iconPath = $request->file('icon')->store('prospeks', 'public');
            $prospek->icon = $iconPath;
        }

        $prospek->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
        ]);

        return redirect()->route('prospek.index')->with('success', "Data Berhasil Diperbaharui!");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prospek = Prospek::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($prospek->image && Storage::disk('public')->exists($prospek->image)) {
            Storage::disk('public')->delete($prospek->image);
        }
        if ($prospek->icon && Storage::disk('public')->exists($prospek->icon)) {
            Storage::disk('public')->delete($prospek->icon);
        }

        $prospek->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
