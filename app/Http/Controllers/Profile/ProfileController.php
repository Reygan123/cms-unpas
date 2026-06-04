<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
  

        // Pass the user data to the view
        return view('profile.index', [
            'users' => User::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);
    
        // Check if the user exists and is the same as the authenticated user
        if (!$user || Auth::id() !== $user->id) {
            return redirect()->route('profile')->with('error', 'Unauthorized action!');
        }
    
        // Update the user data
        $user->update($validatedData);
    
        return redirect()->route('profile')->with('success', 'Update profile berhasil!');
    }
}
