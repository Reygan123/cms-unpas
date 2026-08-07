<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PengabdianMasyarakat;
use Illuminate\Http\Request;

class PengabdianAPIController extends Controller
{
    public function getPengabdianAll(Request $request)
    {
        $data = PengabdianMasyarakat::with('departements')
            ->where('status', 'published')
            ->when($request->kategori && $request->kategori !== 'Semua', fn ($q) => $q->where('kategori', $request->kategori))
            ->when($request->prodi, fn ($q) => $q->whereHas('departements', function ($query) use ($request) {
                $query->where('departements.slug', $request->prodi);
            }))
            ->when($request->search, fn ($q) => $q->where('judul', 'like', '%'.$request->search.'%'))
            ->orderByDesc('tanggal')
            ->get();

        return response()->json($data);
    }

    public function getPengabdianSlug($slug)
    {
        $data = PengabdianMasyarakat::with('departements')
            ->where('status', 'published')
            ->where('slug', $slug)
            ->first();

        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getPengabdianKategori()
    {
        $kategori = PengabdianMasyarakat::where('status', 'published')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');

        return response()->json(array_merge(['Semua'], $kategori->toArray()));
    }
}