<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Post::with(['kategori', 'likes', 'comments.user'])
            ->whereHas('kategori', function ($q) {
                $q->where('judul', 'berita');
            })
            ->get();

        return view('guest.berita', compact('berita'));
    }

    public function show($slug)
    {
        $post = Post::with(['kategori', 'likes', 'comments.user'])
            ->whereHas('kategori', function ($q) {
                $q->where('judul', 'berita');
            })
            ->where('slug', $slug)
            ->firstOrFail();

        return view('guest.beritadetail', compact('post'));
    }
}
