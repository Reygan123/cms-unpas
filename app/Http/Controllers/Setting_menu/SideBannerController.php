<?php

namespace App\Http\Controllers\Setting_menu;

use App\Models\Side_baner;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SideBannerController extends Controller
{
    public function index()
    {
        $sideBanner = Side_baner::first(); 
        $departements = Departement::all();
        return view('setting_menu.viewSideBanner', compact('sideBanner', 'departements'));
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'id_departement' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'status' => 'required',
            'home' => 'required|string',
            'yt' => 'required|string',
            'image1' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

       // Handle image1
    if ($request->hasFile('image1')) {
        $validate['image1'] = $request->file('image1')->store('sideBanner-image', 'public');
    }

    // Handle image2
    if ($request->hasFile('image2')) {
        $validate['image2'] = $request->file('image2')->store('sideBanner-image', 'public');
    }

    Side_baner::create($validate);

    return redirect()->back()->with('success', 'Data Side Banner berhasil diperbarui.');

    }

    public function update(Request $request)
{
    // dd($request->all());
    $sideBanner = Side_baner::first();

    $validated = $request->validate([
        'id_departement' => 'nullable|string',
        'title' => 'nullable|string',
        'description' => 'nullable',
        'status' => 'nullable',
        'home' => 'nullable|string',
        'yt' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    if ($request->file('image1')) {
        // Hapus gambar lama jika ada
        if ($sideBanner->image1 && Storage::disk('public')->exists($sideBanner->image1)) {
            Storage::disk('public')->delete($sideBanner->image1);
        }
        $validated['image1'] = $request->file('image1')->store('sideBanner-image', 'public');
    }
    if ($request->file('image2')) {
        // Hapus gambar lama jika ada
        if ($sideBanner->image2 && Storage::disk('public')->exists($sideBanner->image2)) {
            Storage::disk('public')->delete($sideBanner->image2);
        }
        $validated['image2'] = $request->file('image2')->store('sideBanner-image', 'public');
    }

   

    $sideBanner->update($validated);

    return redirect()->back()->with('success', 'Data Side Banner berhasil diperbarui.');
}       

}
