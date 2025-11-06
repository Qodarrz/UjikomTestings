<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    protected $routePrefix = 'admin.galeri';
    protected $viewPath = 'admin.galeri';

    protected function view($view, $data = [])
    {
        $data['routePrefix'] = $this->routePrefix;
        $data['viewPath'] = $this->viewPath;
        return view($view, $data);
    }

    /**
     * Tampilkan daftar galeri.
     */
    public function index()
    {
        $galeri = Galery::with('post')->orderBy('position')->get();
        $columns = ['post', 'position', 'status'];

        return $this->view($this->viewPath . '.index', compact('galeri', 'columns'));
    }

    /**
     * Form untuk membuat galeri baru.
     * Ambil semua post agar bisa dipilih.
     */
    public function create()
    {
        $posts = Post::select('id', 'judul')->orderBy('created_at', 'desc')->get();

        return $this->view($this->viewPath . '.create', compact('posts'));
    }

    /**
     * Simpan galeri baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'nullable|integer',
            'status' => 'nullable|integer',
        ]);

        Galery::create([
            'post_id'  => $request->post_id,
            'position' => $request->position ?? 0,
            'status'   => $request->status ?? 1,
        ]);

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Galeri berhasil dibuat.');
    }

    /**
     * Form untuk mengedit galeri.
     */
    public function edit(Galery $galeri)
    {
        $posts = Post::select('id', 'title')->orderBy('created_at', 'desc')->get();

        return $this->view($this->viewPath . '.edit', compact('galeri', 'posts'));
    }

    /**
     * Update data galeri.
     */

    /**
     * Tampilkan detail galeri beserta semua foto terkait.
     */
    public function show(Galery $galeri)
    {
        // Load relasi foto yang terkait dengan galeri ini
        $galeri->load('foto'); // pastikan relasi 'foto' sudah ada di model Galery

        return $this->view($this->viewPath . '.show', compact('galeri'));
    }

    public function update(Request $request, Galery $galeri)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'nullable|integer',
            'status' => 'nullable|integer',
        ]);

        $galeri->update([
            'post_id'  => $request->post_id,
            'position' => $request->position ?? 0,
            'status'   => $request->status ?? 1,
        ]);

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Hapus galeri dari database.
     */
    public function destroy(Galery $galeri)
    {
        $galeri->delete();

        return redirect()->route($this->routePrefix . '.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}
