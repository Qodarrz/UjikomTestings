<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Post;

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
     * 🖼️ Galeri Kegiatan
     * Menampilkan daftar album galeri & foto di dalamnya
     */
    public function galeri()
    {
        $galeri = Galery::with('foto')
            ->orderBy('position', 'asc')
            ->get();

        return view('guest.galeri', compact('galeri'));
    }

    /**
     * 📰 Berita / Informasi
     * Menampilkan daftar post yang berstatus publish
     */
    public function posts()
    {
        $posts = Post::with(['kategori', 'petugas'])
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('guest.posts', compact('posts'));
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
