<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

use App\Models\Ourteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Ourteam::all();
        $faculty = Faculty::first();
        return view('faculty.step1', compact('faculty', 'teams'));
    }
    public function step2($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.step2', compact('faculty'));
    }

    public function step3($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.step3', compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'   => 'required|string',
            'akreditasi'   => 'required|string',
            'tagline'   => 'required|string',
            'instagram'   => 'required|string',
            'tiktok'   => 'required|string',
            'facebook'   => 'required|string',
            'youtube'   => 'required|string',
            'title1'   => 'required|string',
            'description1'   => 'required|string',
            'color1'   => 'required|string',
            'color2'   => 'required|string',
            'image1'   => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'yt_id'   => 'required|string',
            'id_team' => 'nullable|integer',
            'status'   => 'nullable|string',
        ]);

        if ($request->hasFile('image1')) {
            $validate['image1'] = $request->file('image1')->store('faculty-image', 'public');
        }

        // Tambahkan default jika tidak diisi
        $validate['status'] = $request->input('status', 'active');

        $faculty = Faculty::create($validate); // Simpan instance-nya

        return redirect()->route('faculty.step2', $faculty->id)->with('success', "Faculty {$faculty->name} berhasil dibuat!");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data Faculty berdasarkan ID
        $faculty = Faculty::findOrFail($id);

        // Validasi input
        $validate = $request->validate([
            'name'        => 'required|string',
            'akreditasi'  => 'required|string',
            'tagline'     => 'required|string',
            'instagram'   => 'required|string',
            'tiktok'      => 'required|string',
            'facebook'    => 'required|string',
            'youtube'     => 'required|string',
            'title1'      => 'required|string',
            'description1' => 'required|string',
            'color1'      => 'required|string',
            'color2'      => 'required|string',
            'image1'      => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'yt_id'       => 'required|string',
            'id_team'   => 'nullable|integer',
            'status'      => 'nullable|string',
        ]);

        // Handle upload gambar jika ada
        if ($request->hasFile('image1')) {
            // Hapus file lama jika ada
            if ($faculty->image1 && Storage::disk('public')->exists($faculty->image1)) {
                Storage::disk('public')->delete($faculty->image1);
            }

            // Simpan file gambar baru
            $validate['image1'] = $request->file('image1')->store('faculty-image', 'public');
        }

        // Tambahkan default jika status tidak diisi
        $validate['status'] = $request->input('status', 'active');

        // Update data faculty
        $faculty->update($validate);

        // Redirect ke halaman berikutnya atau halaman yang sesuai
        return redirect()->route('faculty.step2', $faculty->id)->with('success', "Faculty {$faculty->name} berhasil diperbarui!");
    }

    public function step2Update(Request $request, string $id)
    {
        $faculty = Faculty::findOrFail($id); // Ambil data berdasarkan ID

        $validate = $request->validate([
            'statistik1'         => 'required|string',
            'statistik2'   => 'required|string',
            'statistik3'      => 'required|string',
            'statistik4'    => 'required|string',
            'title2'       => 'required|string',
            'title3'     => 'required|string',
            'description2'      => 'required|string',
            'description3'       => 'required|string',
            'image2'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
            'image3'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image2')) {
            // Hapus gambar lama jika ada
            if ($faculty->image2 && Storage::disk('public')->exists($faculty->image2)) {
                Storage::disk('public')->delete($faculty->image2);
            }

            // Simpan gambar baru
            $validate['image2'] = $request->file('image2')->store('faculty-image', 'public');
        }
        // Jika user upload gambar baru
        if ($request->hasFile('image3')) {
            // Hapus gambar lama jika ada
            if ($faculty->image3 && Storage::disk('public')->exists($faculty->image3)) {
                Storage::disk('public')->delete($faculty->image3);
            }

            // Simpan gambar baru
            $validate['image3'] = $request->file('image3')->store('departement-image', 'public');
        }

        // Simpan perubahan
        $faculty->update($validate);

        return redirect()->route('faculty.step3', $faculty->id)->with('success', "Departement {$faculty->name} berhasil diperbarui!");
    }

    public function step3Update(Request $request, string $id)
    {
        $faculty = Faculty::findOrFail($id); // Ambil data berdasarkan ID

        $validate = $request->validate([
            'link1'         => 'required|string',
            'link2'   => 'required|string',
            'link3'      => 'required|string',
            'link4'    => 'required|string',
            'title4'     => 'required|string',
            'address'     => 'required|string',
            'map'     => 'required|string',
            'description4'      => 'required|string',
            'image4'       => 'nullable|mimes:jpg,jpeg,png,pdf,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image4')) {
            // Hapus gambar lama jika ada
            if ($faculty->image4 && Storage::disk('public')->exists($faculty->image4)) {
                Storage::disk('public')->delete($faculty->image4);
            }

            // Simpan gambar baru
            $validate['image4'] = $request->file('image4')->store('faculty-image', 'public');
        }

        // Simpan perubahan
        $faculty->update($validate);

        return redirect()->route('faculty.index')
            ->with('success', "Departement {$faculty->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
