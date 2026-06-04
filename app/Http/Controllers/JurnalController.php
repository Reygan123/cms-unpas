<?php

namespace App\Http\Controllers;
use App\Models\Jurnal;

use App\Models\Ourteam;
use App\Models\Portofolio;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jurnals = Jurnal::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('jurnal.viewJurnal', compact('jurnals', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        $jurnals = Jurnal::all();
        $teams = Ourteam::all();
        return view('jurnal.createJurnal', compact('departements', 'jurnals', 'teams'));
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
            'name' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'id_team' => 'nullable|integer',
            'image1' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        
        $slug = Str::slug($request->input('title'));


        // Proses upload gambar
        $image1Path = $request->file('image1')->store('jurnal-images', 'public');
        $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('jurnal-images', 'public') : null;
        $image3Path = $request->hasFile('image3') ? $request->file('image3')->store('jurnal-images', 'public') : null;

        // Simpan data ke database
        Jurnal::create([
            'id_departement' => $request->input('id_departement'),
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'id_team' => $request->input('id_team'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'image3' => $image3Path,
            'slug' => $slug,
            
        ]);

        // Redirect setelah berhasil
        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil ditambahkan!');
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
        $jurnal = Jurnal::findOrFail($id);
        $teams = Ourteam::all();

        return view('jurnal.editJurnal', compact('jurnal', 'departements', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id', // Validasi ID departemen
            'title' => 'nullable|string',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'home' => 'nullable|string',
            'id_team' => 'nullable|integer',
            'image1' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'image3' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = Str::slug($request->input('title'));


        // Temukan portofolio berdasarkan ID
        $jurnal = Jurnal::findOrFail($id);

        // Proses upload gambar hanya jika ada file yang diupload
        if ($request->hasFile('image1')) {
            // Hapus gambar lama jika ada
            if ($jurnal->image1) {
                Storage::disk('public')->delete($jurnal->image1);
            }
            $image1Path = $request->file('image1')->store('jurnal-images', 'public');
        } else {
            $image1Path = $jurnal->image1; // Biarkan gambar lama jika tidak ada perubahan
        }

        if ($request->hasFile('image2')) {
            if ($jurnal->image2) {
                Storage::disk('public')->delete($jurnal->image2);
            }
            $image2Path = $request->file('image2')->store('jurnal-images', 'public');
        } else {
            $image2Path = $jurnal->image2;
        }

        if ($request->hasFile('image3')) {
            if ($jurnal->image3) {
                Storage::disk('public')->delete($jurnal->image3);
            }
            $image3Path = $request->file('image3')->store('jurnal-images', 'public');
        } else {
            $image3Path = $jurnal->image3;
        }

        // Perbarui data portofolio
        $jurnal->update([
            'id_departement' => $request->input('id_departement'),
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'id_team' => $request->input('id_team'),
            'image1' => $image1Path,
            'image2' => $image2Path,
            'image3' => $image3Path,
            'slug' => $slug,
        ]);

        // Redirect setelah berhasil
        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan portofolio berdasarkan ID
        $jurnal = Jurnal::findOrFail($id);

        // Hapus gambar-gambar yang terkait jika ada
        if ($jurnal->image1) {
            Storage::disk('public')->delete($jurnal->image1);
        }
        if ($jurnal->image2) {
            Storage::disk('public')->delete($jurnal->image2);
        }
        if ($jurnal->image3) {
            Storage::disk('public')->delete($jurnal->image3);
        }

        // Hapus data portofolio dari database
        $jurnal->delete();

        // Redirect setelah berhasil
        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil dihapus!');
    }

}
