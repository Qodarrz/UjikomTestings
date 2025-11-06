<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $routePrefix = 'admin.posts';

    public function index()
    {
        $posts = Post::with(['kategori', 'petugas'])->latest()->get();
        $columns = ['judul', 'kategori', 'petugas', 'status', 'created_at'];

        return view('admin.posts.index', [
            'posts' => $posts,
            'columns' => $columns,
            'routePrefix' => $this->routePrefix,
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $fields = [
            'judul' => 'text',
            'kategori_id' => 'select',
            'isi' => 'textarea',
            'status' => 'select',
        ];

        return view('admin.posts.create', [
            'kategori' => $kategori,
            'routePrefix' => $this->routePrefix,
            'fields' => $fields,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required',
            'status' => 'required|string',
        ]);

        Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'status' => $request->status,
            'petugas_id' => Auth::guard('petugas')->id(),
        ]);

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Postingan berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $kategori = Kategori::all();
        $fields = [
            'judul' => 'text',
            'kategori_id' => 'select',
            'isi' => 'textarea',
            'status' => 'select',
        ];

        return view('admin.posts.edit', [
            'post' => $post,
            'kategori' => $kategori,
            'fields' => $fields,
            'routePrefix' => $this->routePrefix,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required',
            'status' => 'required|string',
        ]);

        $post->update($request->only(['judul', 'kategori_id', 'isi', 'status']));

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Postingan berhasil dihapus.');
    }
}
