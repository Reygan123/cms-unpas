<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Departement;

class TestimoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $testimonis = Testimonial::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('testimoni.index', compact('testimonis', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('testimoni.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'yt' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan ke database
        Testimonial::create([
            'id_departement' => $request->id_departement,
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
            'yt' => $request->yt,
            'image' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('testimoni.index')->with('success', 'Testimonial berhasil ditambahkan.');
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
        $testimoni = Testimonial::findOrFail($id);
        return view('testimoni.edit', compact('departements', 'testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'yt' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Ambil data testimonial
        $testimonial = Testimonial::findOrFail($id);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');

            // Hapus gambar lama jika ada
            if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
                Storage::disk('public')->delete($testimonial->image);
            }
        } else {
            $imagePath = $testimonial->image;
        }

        // Update data testimonial
        $testimonial->update([
            'id_departement' => $request->id_departement,
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
            'yt' => $request->yt,
            'image' => $imagePath,
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimoni = Testimonial::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
            Storage::disk('public')->delete($testimoni->image);
        }

        $testimoni->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
