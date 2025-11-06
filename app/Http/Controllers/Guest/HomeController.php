<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Foto;

class HomeController extends Controller
{
    /**
     * 🏠 Halaman Utama (Home)
     * Menampilkan profil singkat sekolah & beberapa foto terbaru
     */
    public function index()
    {
        $profil = Profile::first();
        $fotoTerbaru = Foto::with('galery')
            ->latest()
            ->take(8)
            ->get();

        return view('guest.home', compact('profil', 'fotoTerbaru'));
    }

    /**
     * 🏫 Profil Sekolah
     * Menampilkan informasi detail tentang sekolah
     */
    public function profile()
    {
        $profil = Profile::first();
        return view('guest.profile', compact('profil'));
    }

    /**
     * 📞 Kontak Sekolah
     * Menampilkan alamat & informasi kontak dari profil sekolah
     */
    public function contact()
    {
        $profil = Profile::first();
        return view('guest.contact', compact('profil'));
    }
}
