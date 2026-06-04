<?php

namespace App\Http\Controllers\Setting_menu;

use App\Models\Identity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    public function index()
    {
        $identity = Identity::first(); 
        return view('setting_menu.viewIdentity', compact('identity'));
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'title' => 'required|string',
            'meta' => 'required|string',
            'adress' => 'required',
            'link_map' => 'required',
            'phone' => 'required|string',
            'email' => 'required|email',
            'fb' => 'required|string',
            'ig' => 'required|string',
            'tiktok' => 'required|string',
            'yt' => 'required|string',
            'time_service' => 'required|string',
            'day_service' => 'required|string',
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

    Identity::create($validate);

    return redirect()->back()->with('success', 'Data Identity berhasil diperbarui.');

    }

   

public function update(Request $request)
{
   
    $identity = Identity::first();

    $validated = $request->validate([
        'title' => 'nullable|string',
        'meta' => 'nullable|string',
        'adress' => 'nullable',
        'link_map' => 'nullable',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'fb' => 'nullable|string',
        'ig' => 'nullable|string',
        'tiktok' => 'nullable|string',
        'yt' => 'nullable|string',
        'time_service' => 'nullable|string',
        'day_service' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    if ($request->file('image1')) {
        // Hapus gambar lama jika ada
        if ($identity->image1 && Storage::disk('public')->exists($identity->image1)) {
            Storage::disk('public')->delete($identity->image1);
        }
        $validated['image1'] = $request->file('image1')->store('identity-image', 'public');
    }
    if ($request->file('image2')) {
        // Hapus gambar lama jika ada
        if ($identity->image2 && Storage::disk('public')->exists($identity->image2)) {
            Storage::disk('public')->delete($identity->image2);
        }
        $validated['image2'] = $request->file('image2')->store('identity-image', 'public');
    }

    // dd($request->all());

    $identity->update($validated);

    return redirect()->back()->with('success', 'Data identitas berhasil diperbarui.');
}       



}
