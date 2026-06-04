<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Faq_category;
use App\Models\Departement;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $faqs = Faq::query()
            ->when($search, function ($query, $search) {
                $query->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('faqs.index', compact('faqs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Faq_category::all();
        return view('faqs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'id_category' => 'required|exists:faq_categories,id',
        ]);

        // Simpan ke database
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'id_category' => $request->id_category,
        ]);

        // Redirect ke halaman index
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
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
        $faq = Faq::findOrFail($id);
        $categories = Faq_category::all();
        return view('faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'id_category' => 'required|exists:faq_categories,id',
        ]);

        // Cari FAQ berdasarkan ID
        $faq = Faq::findOrFail($id);

        // Update FAQ
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'id_category' => $request->id_category,
        ]);

        // Redirect ke halaman index
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
