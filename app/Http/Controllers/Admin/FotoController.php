<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    protected $routePrefix = 'admin.foto'; // prefix route

    /**
     * Tampilkan semua foto secara global
     */
    public function index()
    {
        $foto = Foto::with('galery')->latest()->get();
        $routePrefix = $this->routePrefix;

        return view('admin.foto.index', compact('foto', 'routePrefix'));
    }

    /**
     * Form tambah foto ke galeri tertentu
     */
    public function create(Galery $galeri)
    {
        $routePrefix = $this->routePrefix;

        return view('admin.foto.create', compact('galeri', 'routePrefix'));
    }

    /**
     * Simpan foto
     */
    public function store(Request $request, Galery $galeri)
    {
        $request->validate([
            'files.*' => 'required|image|max:4096', // max 4MB per file
            'judul' => 'nullable|string|max:255'
        ]);

        foreach ($request->file('files', []) as $file) {
            $path = $file->store('galeri', 'public'); // simpan di storage/app/public/galeri

            $galeri->foto()->create([
                'file' => $path,           // simpan path relatif saja
                'judul' => $request->judul ?? null
            ]);
        }

        return redirect()->route('admin.galeri.show', $galeri->id)
                         ->with('success', 'Foto berhasil ditambahkan.');
    }

    /**
     * Hapus foto
     */
    public function destroy(Foto $foto)
    {
        // hapus file fisik dari storage jika ada
        if (Storage::disk('public')->exists($foto->file)) {
            Storage::disk('public')->delete($foto->file);
        }

        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    /**
     * Detail galeri beserta foto
     */
    public function show(Galery $galeri)
    {
        $galeri->load('post', 'foto');
        $routePrefix = $this->routePrefix;

        return view('admin.galeri.show', compact('galeri', 'routePrefix'));
    }
}
