<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Departement;
use Illuminate\Support\Facades\Storage;

class ArchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $achievements = Achievement::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('winner_name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('achievement.index', compact('achievements', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('achievement.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'name' => 'required|string',
            'winner_name' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Simpan file gambar
        $imagePath = $request->file('image')->store('achievements', 'public');

        Achievement::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'name' => $request->name,
            'winner_name' => $request->winner_name,
            'description' => $request->description,
            'home' => $request->home,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('achievement.index')->with('success', 'Prestasi berhasil ditambahkan.');
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
        $achievement = Achievement::findOrFail($id);
        return view('achievement.edit', compact('departements', 'achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'name' => 'required|string',
            'winner_name' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'home' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        $achievement = Achievement::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('achievements', 'public');
    
            // Hapus gambar lama jika ada
            if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
                Storage::disk('public')->delete($achievement->image);
            }
        } else {
            $imagePath = $achievement->image;
        }
    
        $achievement->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'name' => $request->name,
            'winner_name' => $request->winner_name,
            'description' => $request->description,
            'home' => $request->home,
            'category' => $request->category,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('achievement.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
