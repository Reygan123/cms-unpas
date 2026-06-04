<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Departement;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $facilitys = Facility::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('fasilitas.index', compact('facilitys', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('fasilitas.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'yt' => 'nullable|string',
        ]);

        // Simpan file gambar ke storage jika ada
        $imagePath1 = $request->file('image1')->store('facilities', 'public');
        $imagePath2 = $request->hasFile('image2') ? $request->file('image2')->store('facilities', 'public') : null;
        $imagePath3 = $request->hasFile('image3') ? $request->file('image3')->store('facilities', 'public') : null;
        $imagePath4 = $request->hasFile('image4') ? $request->file('image4')->store('facilities', 'public') : null;
        $imagePath5 = $request->hasFile('image5') ? $request->file('image5')->store('facilities', 'public') : null;
        $imagePath6 = $request->hasFile('image6') ? $request->file('image6')->store('facilities', 'public') : null;

        Facility::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'home' => $request->home,
            'image1' => $imagePath1,
            'image2' => $imagePath2,
            'image3' => $imagePath3,
            'image4' => $imagePath4,
            'image5' => $imagePath5,
            'image6' => $imagePath6,
            'yt' => $request->yt,
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
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
        $fasilitas = Facility::findOrFail($id);
        $departements = Departement::all();
        return view('fasilitas.edit', compact('fasilitas', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'id_departement' => 'nullable|exists:departements,id',
        'title' => 'required|string',
        'subtitle' => 'required|string',
        'description' => 'required|string',
        'home' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image4' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image5' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image6' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'yt' => 'nullable|string',
    ]);

    $facility = Facility::findOrFail($id);

    // Array penampung path gambar baru
    $imageFields = ['image1', 'image2', 'image3', 'image4', 'image5', 'image6'];
    $imagePaths = [];

    foreach ($imageFields as $field) {
        if ($request->hasFile($field)) {
            // Simpan file baru
            $newPath = $request->file($field)->store('facilities', 'public');

            // Hapus gambar lama jika ada
            if ($facility->$field && Storage::disk('public')->exists($facility->$field)) {
                Storage::disk('public')->delete($facility->$field);
            }

            $imagePaths[$field] = $newPath;
        } else {
            // Gunakan gambar lama jika tidak diubah
            $imagePaths[$field] = $facility->$field;
        }
    }

    // Update semua field
    $facility->update([
        'id_departement' => $request->id_departement,
        'title'          => $request->title,
        'subtitle'       => $request->subtitle,
        'description'    => $request->description,
        'home'           => $request->home,
        'image1'         => $imagePaths['image1'],
        'image2'         => $imagePaths['image2'],
        'image3'         => $imagePaths['image3'],
        'image4'         => $imagePaths['image4'],
        'image5'         => $imagePaths['image5'],
        'image6'         => $imagePaths['image6'],
        'yt'             => $request->yt,
    ]);

    return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitas = Facility::findOrFail($id);

        // Daftar field gambar
        $imageFields = ['image1', 'image2', 'image3', 'image4'];

        // Hapus masing-masing gambar dari storage jika ada
        foreach ($imageFields as $field) {
            if ($fasilitas->$field && Storage::disk('public')->exists($fasilitas->$field)) {
                Storage::disk('public')->delete($fasilitas->$field);
            }
        }

        // Hapus data dari database
        $fasilitas->delete();

        return redirect()->back()->with('success', 'Data fasilitas berhasil dihapus.');
    }
}
