<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;

class GaleryController extends Controller
{
    public function index()
    {
        $galeri = Post::with(['kategori', 'galery.foto', 'likes', 'comments.user'])
            ->whereHas('kategori', function ($q) {
                $q->where('judul', 'galeri');
            })
            ->get();

        return view('guest.galeri', compact('galeri'));
    }

    public function show($id)
    {
        $post = Post::with(['kategori', 'galery.foto', 'comments.user'])
            ->whereHas('kategori', function ($q) {
                $q->where('judul', 'galeri');
            })
            ->where('id', $id)
            ->firstOrFail();

        return view('guest.galeridetail', compact('post'));
    }
}
