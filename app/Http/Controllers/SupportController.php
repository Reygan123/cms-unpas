<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\Departement;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $suports = Support::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('support_by', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('suports.index', compact('suports', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('suports.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'name' => 'required|string',
            'support_by' => 'required|string',
            'yt' => 'required|string',
            'home' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('supports', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan ke database
        Support::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'name' => $request->name,
            'support_by' => $request->support_by,
            'yt' => $request->yt,
            'home' => $request->home,
            'image' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('suport.index')->with('success', 'Support berhasil ditambahkan.');
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
        $suport = Support::findOrFail($id);
        return view('suports.edit', compact('departements', 'suport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'name' => 'required|string',
            'support_by' => 'required|string',
            'yt' => 'required|string',
            'home' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Ambil data support
        $support = Support::findOrFail($id);

        // Proses upload gambar baru jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('supports', 'public');

            // Hapus gambar lama jika ada
            if ($support->image && Storage::disk('public')->exists($support->image)) {
                Storage::disk('public')->delete($support->image);
            }
        } else {
            $imagePath = $support->image;
        }

        // Update data
        $support->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'name' => $request->name,
            'support_by' => $request->support_by,
            'yt' => $request->yt,
            'home' => $request->home,
            'image' => $imagePath,
        ]);

        // Redirect setelah update
        return redirect()->route('suport.index')->with('success', 'Support berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suport = Support::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($suport->image && Storage::disk('public')->exists($suport->image)) {
            Storage::disk('public')->delete($suport->image);
        }

        $suport->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
