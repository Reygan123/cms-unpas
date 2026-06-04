<?php

namespace App\Http\Controllers\Profile;

use App\Models\Partner;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
     
        $partners = Partner::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ;
        })
        ->paginate(20)
        ->withQueryString(); // biar query search tetap ada saat ganti halaman

    return view('partners.viewPartner', compact('partners', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('partners.createPartner', [
            'departements' => Departement::all(),
        ]);
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
        'id_departement' => 'required|string',
        'name' => 'required|string',
        'url' => 'required',
        'description' => 'required|string',
        'detail' => 'required|string',
        'status' => 'required|string',
        'home' => 'nullable|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

       
        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('partner-image', 'public');
        }

      Partner::create($validate);

      return redirect()->route('partner.index')->with('success', 'Data Partner berhasil dibuat!');

    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        $departements = Departement::all();

        return view('partners.editPartner', compact('partner', 'departements')); 
    }

    public function update(Request $request, $id)
    {
    $partner = Partner::findOrFail($id);

    $validated = $request->validate([
        'id_departement' => 'nullable|string',
        'name' => 'nullable|string',
        'url' => 'nullable',
        'description' => 'nullable|string',
        'detail' => 'nullable|string',
        'status' => 'nullable|string',
        'home' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

   
    if($request->file('image')){
        $validated['image'] = $request->file('image')->store('partner-image', 'public');
    }
    
    $partner->update($validated);

    return redirect()->route('partner.index', $partner->id)->with('success', 'Data partner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
    
        // Cek apakah gambar ada dan hapus dari storage
        if ($partner->image && Storage::disk('public')->exists($partner->image)) {
            Storage::disk('public')->delete($partner->image);
        }
       
    
        $partner->delete();
    
        return redirect()->back()->with('success', 'Data Partner berhasil dihapus.');
    }
}
