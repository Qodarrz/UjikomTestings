<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profil = Profile::first();
        return view('admin.profile.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Profile::first();
        return view('admin.profile.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required'
        ]);

        $profil = Profile::first();
        if ($profil) {
            $profil->update($request->only('judul', 'isi'));
        } else {
            Profile::create($request->only('judul', 'isi'));
        }

        return redirect()->route('profile.index')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
