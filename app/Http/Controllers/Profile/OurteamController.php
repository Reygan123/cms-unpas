<?php

namespace App\Http\Controllers\Profile;

use App\Models\Ourteam;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurteamController extends Controller
{
    public function index(Request $request)
    {
           $search = $request->input('search');

           $ourteams = Ourteam::query()
           ->when($search, function ($query, $search) {
               $query->where('name', 'like', "%{$search}%")
                   ->orWhere('title', 'like', "%{$search}%");
           })
           ->paginate(10)
           ->withQueryString(); // biar query search tetap ada saat ganti halaman

       return view('our_team.viewOurteam', compact('ourteams', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('our_team.createOurteam', [
            'departements' => Departement::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
        'id_departement' => 'required|string',
        'name' => 'required|string',
        'title' => 'required',
        'phone' => 'required|string',
        'email' => 'required|email',
        'fb' => 'required|string',
        'ig' => 'required|string',
        'tiktok' => 'required|string',
        'yt' => 'required|string',
        'home' => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('ourteam-image', 'public');
        }

      Ourteam::create($validate);

      return redirect()->route('ourteam.index')->with('success', 'Data Ourteam berhasil dibuat!');

    }

    public function edit($id)
    {
        $ourteam = Ourteam::findOrFail($id);
        $departements = Departement::all();

        return view('our_team.editOurteam', compact('ourteam', 'departements'));
    }

    public function update(Request $request, $id)
    {
    $ourteam = Ourteam::findOrFail($id);

    $validated = $request->validate([
        'id_departement' => 'nullable|string',
        'name' => 'nullable|string',
        'title' => 'nullable',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'fb' => 'nullable|string',
        'ig' => 'nullable|string',
        'tiktok' => 'nullable|string',
        'yt' => 'nullable|string',
        'home' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


    if($request->file('image')){
        $validated['image'] = $request->file('image')->store('ourteam-image', 'public');
    }

    $ourteam->update($validated);

    return redirect()->route('ourteam.index', $ourteam->id)->with('success', 'Data Ourteam berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ourteam = Ourteam::findOrFail($id);

        // Cek apakah gambar ada dan hapus dari storage
        if ($ourteam->image && Storage::disk('public')->exists($ourteam->image)) {
            Storage::disk('public')->delete($ourteam->image);
        }


        $ourteam->delete();

        return redirect()->back()->with('success', 'Data Ourteam berhasil dihapus.');
    }
}
