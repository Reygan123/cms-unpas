<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $code = rand(100000, 999999);
        $user->two_factor_code = $code;
        $user->save();

        Mail::raw("Your two-factor authentication code is: $code", function ($message) use ($user) {
            $message->to($user->email)->subject('Two-Factor Authentication Code');
        });

        return view('auth.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->two_factor_code == $request->code) {
            $user->two_factor_code = null;
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Two-factor authentication successful.');
        }

        return back()->withErrors(['code' => 'The provided two-factor code is incorrect.']);
    }
}
