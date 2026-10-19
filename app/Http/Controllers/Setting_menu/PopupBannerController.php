<?php

namespace App\Http\Controllers\Setting_menu;

use App\Http\Controllers\Controller;
use App\Models\PopupBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PopupBannerController extends Controller
{
    public function index()
    {
        $popupBanner = PopupBanner::first();
        return view('setting_menu.viewPopupBanner', compact('popupBanner'));
    }

    public function save(Request $request)
    {
        $popupBanner = PopupBanner::first();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => ($popupBanner ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png,webp|max:3072',
            'link' => 'nullable|url|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($popupBanner && $popupBanner->image && ! Str::startsWith($popupBanner->image, ['http://', 'https://'])
                && Storage::disk('public')->exists($popupBanner->image)) {
                Storage::disk('public')->delete($popupBanner->image);
            }
            $validated['image'] = $request->file('image')->store('popup-banner', 'public');
        }

        if ($popupBanner) {
            $popupBanner->update($validated);
        } else {
            PopupBanner::create($validated);
        }

        return redirect()->back()->with('success', 'Pengaturan Pop-up Banner berhasil disimpan.');
    }
}
