<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Usp;
use App\Models\Departement;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $unggulans = Usp::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('unggulan.index', compact('unggulans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('unggulan.create', compact('departements'));
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
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'home' => 'nullable|string',
        ]);

        // Simpan gambar
        $imagePath = $request->file('image')->store('usps', 'public');

        // Simpan data ke database
        Usp::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'home' => $request->home,
        ]);

        return redirect()->route('unggulan.index')->with('success', "Data berhasil dibuat!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departements = Departement::all();
        $unggulan = Usp::findOrFail($id);
        return view('unggulan.edit', compact('departements', 'unggulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usp = Usp::findOrFail($id);

        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'home' => 'nullable|string',
        ]);

        // Jika ada gambar baru, simpan dan hapus gambar lama
        if ($request->hasFile('image')) {
            if ($usp->image && Storage::disk('public')->exists($usp->image)) {
                Storage::disk('public')->delete($usp->image);
            }

            $imagePath = $request->file('image')->store('usps', 'public');
            $usp->image = $imagePath;
        }

        $usp->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
        ]);

        return redirect()->route('unggulan.index')->with('success', "Data Berhasil Diperbaharui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usp = Usp::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($usp->image && Storage::disk('public')->exists($usp->image)) {
            Storage::disk('public')->delete($usp->image);
        }

        $usp->delete();

        return redirect()->back()->with('success', 'USP berhasil dihapus.');
    }
}
