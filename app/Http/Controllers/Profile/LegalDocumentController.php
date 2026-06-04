<?php

namespace App\Http\Controllers\Profile;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Legal_document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LegalDocumentController extends Controller
{
    public function index(Request $request)
    {
           $search = $request->input('search');

           $legalDocuments = Legal_document::query()
           ->when($search, function ($query, $search) {
               $query->where('name', 'like', "%{$search}%")
                   ->orWhere('title', 'like', "%{$search}%");
           })
           ->paginate(10)
           ->withQueryString(); // biar query search tetap ada saat ganti halaman

       return view('legalDocument.viewLegalDocument', compact('legalDocuments', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('legalDocument.createLegalDocument', [
            'departements' => Departement::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
        'id_departement' => 'required|string',
        'title' => 'required|string',
        'description' => 'required|string',
        'home' => 'nullable|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('legalDocument-image', 'public');
        }

      Legal_document::create($validate);

      return redirect()->route('legalDocument.index')->with('success', 'Data Legal Documents berhasil dibuat!');

    }


    public function edit($id)
    {
        $legalDocument = Legal_document::findOrFail($id);
        $departements = Departement::all();

        return view('legalDocument.editLegalDocument', compact('legalDocument', 'departements'));
    }

    public function update(Request $request, $id)
    {
    $legalDocument = Legal_document::findOrFail($id);

    $validated = $request->validate([
        'id_departement' => 'nullable|string',
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'home' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


    if($request->file('image')){
        $validated['image'] = $request->file('image')->store('legalDocument-image', 'public');
    }

    $legalDocument->update($validated);

    return redirect()->route('legalDocument.index', $legalDocument->id)->with('success', 'Data Legal Document berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $legalDocument = Legal_document::findOrFail($id);

        // Cek apakah gambar ada dan hapus dari storage
        if ($legalDocument->image && Storage::disk('public')->exists($legalDocument->image)) {
            Storage::disk('public')->delete($legalDocument->image);
        }


        $legalDocument->delete();

        return redirect()->back()->with('success', 'Data legal Document berhasil dihapus.');
    }
}
