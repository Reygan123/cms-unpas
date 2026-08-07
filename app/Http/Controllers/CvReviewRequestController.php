<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CvReviewRequest;
use Illuminate\Http\Request;

class CvReviewRequestController extends Controller
{
    public function index(Request $request)
    {
        $cvReviewRequests = CvReviewRequest::with('departement')
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->orderByDesc('created_at')
            ->get();

        return view('cv_review_request.index', compact('cvReviewRequests'));
    }

    public function show(CvReviewRequest $cvReviewRequest)
    {
        return view('cv_review_request.show', compact('cvReviewRequest'));
    }

    public function update(Request $request, CvReviewRequest $cvReviewRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:diajukan,diproses,selesai',
            'catatan_admin' => 'nullable|string',
        ]);

        $cvReviewRequest->update($validated);

        return redirect()->route('cv-review-requests.index')
            ->with('success', 'Status permintaan berhasil diperbarui.');
    }

    public function destroy(CvReviewRequest $cvReviewRequest)
    {
        $cvReviewRequest->delete();

        return redirect()->route('cv-review-requests.index')
            ->with('success', 'Permintaan berhasil dihapus.');
    }
}