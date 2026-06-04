<?php

namespace App\Http\Controllers\Setting_menu;

use App\Models\Slider;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sliders = Slider::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ;
        })
        ->paginate(10)
        ->withQueryString(); // biar query search tetap ada saat ganti halaman

    return view('setting_menu.sliders.viewSlider', compact('sliders', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('setting_menu.sliders.createSlider', [
            'departements' => Departement::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_departement'   => 'required|integer',
            'title'  => 'required',
            'description' => 'required',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
            'yt'   => 'nullable|string',
            'status'      => 'required|string',
            'home' => 'required',
        ]);


        if($request->file('image1')){
            $validate['image1'] = $request->file('image1')->store('slider-image', 'public');
        }
        if($request->file('image2')){
            $validate['image2'] = $request->file('image2')->store('slider-image', 'public');
        }

      Slider::create($validate);

      return redirect()->route('slider.index')->with('success', 'Slider berhasil dibuat!');

    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $departements = Departement::all();

        return view('setting_menu.sliders.editSlider', compact('slider', 'departements'));
    }

    public function update(Request $request, $id)
    {
    $slider = Slider::findOrFail($id);

    $validated = $request->validate([
        'id_departement'   => 'nullable|integer',
        'title'  => 'nullable',
        'description' => 'nullable',
        'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
        'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
        'yt'   => 'nullable|string',
        'status'      => 'nullable|string',
        'home' => 'nullable',
    ]);


    if($request->file('image1')){
        $validated['image1'] = $request->file('image1')->store('slider-image', 'public');
    }
    if($request->file('image2')){
        $validated['image2'] = $request->file('image2')->store('slider-image', 'public');
    }
    $slider->update($validated);

    return redirect()->route('slider.index', $slider->id)->with('success', 'Slider berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Cek apakah gambar ada dan hapus dari storage
        if ($slider->image1 && Storage::disk('public')->exists($slider->image1)) {
            Storage::disk('public')->delete($slider->image1);
        }
        if ($slider->image2 && Storage::disk('public')->exists($slider->image2)) {
            Storage::disk('public')->delete($slider->image2);
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider berhasil dihapus.');
    }

}



