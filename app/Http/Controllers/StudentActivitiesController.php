<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Departement;

class StudentActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $organizations = Organization::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('organization.index', compact('organizations', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('organization.create', compact('departements'));
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
            'description' => 'required|string',
            'home' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Proses upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('organisasis', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan data ke database
        $organization = Organization::create([
            'id_departement' => $request->input('id_departement'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'image' => $imagePath,
        ]);

        // Redirect atau return response setelah sukses
        return redirect()->route('organization.index')->with('success', 'Organization created successfully.');
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
        $organization = Organization::findOrFail($id);
        return view('organization.edit', compact('departements', 'organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'home' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Ambil data organization
        $organization = Organization::findOrFail($id);

        // Cek apakah ada file gambar baru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('organisasis', 'public');

            // Hapus gambar lama jika ada
            if ($organization->image && Storage::disk('public')->exists($organization->image)) {
                Storage::disk('public')->delete($organization->image);
            }
        } else {
            $imagePath = $organization->image;
        }

        // Update data di database
        $organization->update([
            'id_departement' => $request->input('id_departement'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'home' => $request->input('home'),
            'image' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('organization.index')->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($organization->image && Storage::disk('public')->exists($organization->image)) {
            Storage::disk('public')->delete($organization->image);
        }

        $organization->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
