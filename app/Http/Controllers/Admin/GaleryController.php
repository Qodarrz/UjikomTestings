<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeri = Galery::with('post')->orderBy('position')->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('admin.galeri.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'nullable|integer',
            'status' => 'nullable|integer'
        ]);

        Galery::create($request->only('post_id', 'position', 'status'));

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dibuat.');
    }

    public function edit(Galery $galeri)
    {
        $posts = Post::all();
        return view('admin.galeri.edit', compact('galeri', 'posts'));
    }

    public function update(Request $request, Galery $galeri)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'nullable|integer',
            'status' => 'nullable|integer'
        ]);

        $galeri->update($request->only('post_id', 'position', 'status'));

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galery $galeri)
    {
        $galeri->delete();
        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}
