<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Departement;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $portofolios = Portofolio::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('portofolio.index', compact('portofolios', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('portofolio.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id', // Validasi ID departemen
            'title' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'image1' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'yt' => 'nullable',
        ]);

        // Proses upload gambar
        $image1Path = $request->file('image1')->store('portofolio-images', 'public');
        $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('portofolio-images', 'public') : null;
        $image3Path = $request->hasFile('image3') ? $request->file('image3')->store('portofolio-images', 'public') : null;

        // Simpan data ke database
        $portofolio = Portofolio::create([
            'id_departement' => $request->input('id_departement'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'image3' => $image3Path,
            'yt' => $request->input('yt'),
        ]);

        // Redirect setelah berhasil
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan!');
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
        $portofolio = Portofolio::findOrFail($id);
        return view('portofolio.edit', compact('portofolio', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id', // Validasi ID departemen
            'title' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'image1' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'yt' => 'nullable',
        ]);

        // Temukan portofolio berdasarkan ID
        $portofolio = Portofolio::findOrFail($id);

        // Proses upload gambar hanya jika ada file yang diupload
        if ($request->hasFile('image1')) {
            // Hapus gambar lama jika ada
            if ($portofolio->image1) {
                Storage::disk('public')->delete($portofolio->image1);
            }
            $image1Path = $request->file('image1')->store('portofolio-images', 'public');
        } else {
            $image1Path = $portofolio->image1; // Biarkan gambar lama jika tidak ada perubahan
        }

        if ($request->hasFile('image2')) {
            if ($portofolio->image2) {
                Storage::disk('public')->delete($portofolio->image2);
            }
            $image2Path = $request->file('image2')->store('portofolio-images', 'public');
        } else {
            $image2Path = $portofolio->image2;
        }

        if ($request->hasFile('image3')) {
            if ($portofolio->image3) {
                Storage::disk('public')->delete($portofolio->image3);
            }
            $image3Path = $request->file('image3')->store('portofolio-images', 'public');
        } else {
            $image3Path = $portofolio->image3;
        }

        // Perbarui data portofolio
        $portofolio->update([
            'id_departement' => $request->input('id_departement'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'image3' => $image3Path,
            'yt' => $request->input('yt'),
        ]);

        // Redirect setelah berhasil
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan portofolio berdasarkan ID
        $portofolio = Portofolio::findOrFail($id);

        // Hapus gambar-gambar yang terkait jika ada
        if ($portofolio->image1) {
            Storage::disk('public')->delete($portofolio->image1);
        }
        if ($portofolio->image2) {
            Storage::disk('public')->delete($portofolio->image2);
        }
        if ($portofolio->image3) {
            Storage::disk('public')->delete($portofolio->image3);
        }

        // Hapus data portofolio dari database
        $portofolio->delete();

        // Redirect setelah berhasil
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil dihapus!');
    }

}
