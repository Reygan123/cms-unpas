<?php

namespace App\Http\Controllers;
use App\Models\Usp;

use App\Models\Timeline;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $timelines = Timeline::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // biar query search tetap ada saat ganti halaman

        return view('timeline.viewTimeline', compact('timelines', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('timeline.createTimeline', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home' => 'nullable|string',
            'date' => 'nullable|string',
            'slug' => 'nullable|string',
            'no_urut' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->input('title'));
        

        // Simpan gambar
        $imagePath = $request->file('image')->store('timeline-image', 'public');

        // Simpan data ke database
        Timeline::create([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'home' => $request->home,
            'date' => $request->date,
            'no_urut' => $request->no_urut,
            'slug' => $slug,
        ]);

        return redirect()->route('timeline.index')->with('success', "Data Timeline berhasil dibuat!");
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
        $timeline = Timeline::findOrFail($id);
        return view('timeline.editTimeline', compact('departements', 'timeline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $timeline = Timeline::findOrFail($id);

        $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home' => 'nullable|string',
            'date' => 'nullable|string',
            'no_urut' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->input('title'));


        // Jika ada gambar baru, simpan dan hapus gambar lama
        if ($request->hasFile('image')) {
            if ($timeline->image && Storage::disk('public')->exists($timeline->image)) {
                Storage::disk('public')->delete($timeline->image);
            }

            $imagePath = $request->file('image')->store('timeline', 'public');
            $timeline->image = $imagePath;
        }

        $timeline->update([
            'id_departement' => $request->id_departement,
            'title' => $request->title,
            'description' => $request->description,
            'home' => $request->home,
            'date' => $request->date,
            'no_urut' => $request->no_urut,
            'slug' => $slug,
        ]);

        return redirect()->route('timeline.index')->with('success', "Data Timeline Berhasil Diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timeline = Timeline::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($timeline->image && Storage::disk('public')->exists($timeline->image)) {
            Storage::disk('public')->delete($timeline->image);
        }

        $timeline->delete();

        return redirect()->back()->with('success', 'Data Timeline berhasil dihapus.');
    }
}
