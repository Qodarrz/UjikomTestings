<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Prefix route agar konsisten di seluruh view & redirect.
     */
    protected $routePrefix = 'admin.posts';

    /**
     * Menampilkan daftar postingan.
     */
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

    /**
     * Form tambah postingan baru.
     */
    public function create()
    {
        $kategori = Kategori::all();

        $routePrefix = $this->routePrefix;

        // field untuk form (otomatis terbaca di Blade)
        $fields = [
            'judul' => 'text',
            'kategori_id' => 'select',
            'isi' => 'textarea',
            'status' => 'select',
            'thumbnail' => 'file',
        ];

        return view('admin.posts.create', [
            'kategori' => $kategori,
            'routePrefix' => $routePrefix,
            'fields' => $fields,
        ]);
    }




    /**
     * Simpan postingan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required',
            'status' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $path = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('thumbnails', 'public')
            : null;

        Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'status' => $request->status,
            'petugas_id' => Auth::guard('petugas')->id(),
            'thumbnail' => $path,
        ]);

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Postingan berhasil ditambahkan.');
    }

    /**
     * Form edit postingan.
     */
    public function edit(Post $post)
    {
        $kategori = Kategori::all();

        $fields = [
            'judul' => 'text',
            'kategori_id' => 'select',
            'isi' => 'textarea',
            'status' => 'select',
            'thumbnail' => 'file',
        ];

        return view('admin.posts.edit', [
            'post' => $post,
            'kategori' => $kategori,
            'fields' => $fields,
            'routePrefix' => $this->routePrefix,
        ]);
    }


    /**
     * Update data postingan.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required',
            'status' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'kategori_id', 'isi', 'status']);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data);

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Postingan berhasil diperbarui.');
    }

    /**
     * Hapus postingan.
     */
    public function destroy(Post $post)
    {
        // Hapus file thumbnail jika ada
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Postingan berhasil dihapus.');
    }
}
