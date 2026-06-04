<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Faq_category;
use App\Models\Faq;
use App\Models\Departement;

class FaqCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Faq_category::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('faq_categories.index', compact('categories', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan ke database
        Faq_category::create([
            'name' => $request->name,
        ]);

        // Redirect ke halaman index
        return redirect()->route('faqcategories.index')->with('success', 'Kategori FAQ berhasil ditambahkan.');
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
        // Cari kategori FAQ berdasarkan ID
        $faqCategory = Faq_category::findOrFail($id);

        // Pass kategori FAQ ke view
        return view('faq_categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string',
        ]);

        // Cari kategori FAQ berdasarkan ID
        $faqCategory = Faq_category::findOrFail($id);

        // Update kategori FAQ
        $faqCategory->update([
            'name' => $request->name,
        ]);

        // Redirect ke halaman index
        return redirect()->route('faqcategories.index')->with('success', 'Kategori FAQ berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kategori FAQ berdasarkan ID
        $faqCategory = Faq_category::findOrFail($id);

        // Hapus kategori FAQ
        $faqCategory->delete();

        // Redirect ke halaman index
        return redirect()->route('faqcategories.index')->with('success', 'Kategori FAQ berhasil dihapus.');
    }
}
