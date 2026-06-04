<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
{
    $users = User::all(); // Ambil semua data user
    return view('profile', compact('users')); // Kirim ke view
}
}
