<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departements = Departement::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('tagline', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('departement.index', compact('departements', 'search'));
    }

    public function step2($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.step2', compact('departement'));
    }

    public function step3($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.step3', compact('departement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'   => 'required|string',
            'akreditasi'   => 'required|string',
            'tagline'   => 'required|string',
            'instagram'   => 'required|string',
            'tiktok'   => 'required|string',
            'facebook'   => 'required|string',
            'youtube'   => 'required|string',
            'title1'   => 'required|string',
            'description1'   => 'required|string',
            'color1'   => 'required|string',
            'color2'   => 'required|string',
            'image1'   => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'yt_id'   => 'required|string',
            'status'   => 'nullable|string',
        ]);

        // Buat slug otomatis
        $validate['slug'] = Str::slug($validate['name']);

        if ($request->hasFile('image1')) {
            $validate['image1'] = $request->file('image1')->store('departement-image', 'public');
        }

        // Tambahkan default jika tidak diisi
        $validate['status'] = $request->input('status', 'active');

        $departement = Departement::create($validate); // Simpan instance-nya

        return redirect()->route('departement.step2', $departement->id)->with('success', "Departement {$departement->name} berhasil dibuat!");
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
        $departement = Departement::findOrFail($id);
        return view('departement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departement = Departement::findOrFail($id); // Ambil data berdasarkan ID

        $validate = $request->validate([
            'name'         => 'required|string',
            'akreditasi'   => 'required|string',
            'tagline'      => 'required|string',
            'instagram'    => 'required|string',
            'tiktok'       => 'required|string',
            'facebook'     => 'required|string',
            'youtube'      => 'required|string',
            'title1'       => 'required|string',
            'description1' => 'required|string',
            'color1'       => 'required|string',
            'color2'       => 'required|string',
            'image1'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'yt_id'        => 'required|string',
            'status'       => 'nullable|string',
        ]);

        // Buat slug otomatis
        $validate['slug'] = Str::slug($validate['name']);

        // Jika user upload gambar baru
        if ($request->hasFile('image1')) {
            // Hapus gambar lama jika ada
            if ($departement->image1 && Storage::disk('public')->exists($departement->image1)) {
                Storage::disk('public')->delete($departement->image1);
            }

            // Simpan gambar baru
            $validate['image1'] = $request->file('image1')->store('departement-image', 'public');
        }

        // Set default status jika kosong
        $validate['status'] = $request->input('status', 'active');

        // Simpan perubahan
        $departement->update($validate);

        return redirect()->route('departement.step2', $departement->id)->with('success', "Departement {$departement->name} berhasil diperbarui!");
    }

    public function step2Update(Request $request, string $id)
    {
        $departement = Departement::findOrFail($id); // Ambil data berdasarkan ID

        $validate = $request->validate([
            'statistik1'         => 'required|string',
            'statistik2'   => 'required|string',
            'statistik3'      => 'required|string',
            'statistik4'    => 'required|string',
            'title2'       => 'required|string',
            'title3'     => 'required|string',
            'description2'      => 'required|string',
            'description3'       => 'required|string',
            'image2'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'image3'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image2')) {
            // Hapus gambar lama jika ada
            if ($departement->image2 && Storage::disk('public')->exists($departement->image2)) {
                Storage::disk('public')->delete($departement->image2);
            }

            // Simpan gambar baru
            $validate['image2'] = $request->file('image2')->store('departement-image', 'public');
        }
        // Jika user upload gambar baru
        if ($request->hasFile('image3')) {
            // Hapus gambar lama jika ada
            if ($departement->image3 && Storage::disk('public')->exists($departement->image3)) {
                Storage::disk('public')->delete($departement->image3);
            }

            // Simpan gambar baru
            $validate['image3'] = $request->file('image3')->store('departement-image', 'public');
        }

        // Simpan perubahan
        $departement->update($validate);

        return redirect()->route('departement.step3', $departement->id)->with('success', "Departement {$departement->name} berhasil diperbarui!");
    }

    public function step3Update(Request $request, string $id)
    {
        $departement = Departement::findOrFail($id); // Ambil data berdasarkan ID

        $validate = $request->validate([
            'link1'         => 'required|string',
            'link2'   => 'required|string',
            'link3'      => 'required|string',
            'link4'    => 'required|string',
            'title4'     => 'required|string',
            'address'     => 'required|string',
            'map'     => 'required|string',
            'description4'      => 'required|string',
            'image4'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image4')) {
            // Hapus gambar lama jika ada
            if ($departement->image4 && Storage::disk('public')->exists($departement->image4)) {
                Storage::disk('public')->delete($departement->image4);
            }

            // Simpan gambar baru
            $validate['image4'] = $request->file('image4')->store('departement-image', 'public');
        }

        // Simpan perubahan
        $departement->update($validate);

        return redirect()->route('departement.index')
            ->with('success', "Departement {$departement->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departement = Departement::findOrFail($id);

        // Hapus semua gambar jika ada
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($departement->$imageField && Storage::disk('public')->exists($departement->$imageField)) {
                Storage::disk('public')->delete($departement->$imageField);
            }
        }

        // Hapus data dari database
        $departement->delete();

        return redirect()->route('departement.index')->with('success', 'Departement berhasil dihapus beserta gambar-gambarnya.');
    }
}
