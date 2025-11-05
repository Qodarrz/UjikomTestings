<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $foto = Foto::with('galery')->latest()->get();
        return view('admin.foto.index', compact('foto'));
    }

    public function create()
    {
        $galeri = Galery::all();
        return view('admin.foto.create', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'files.*' => 'required|image|max:4096'
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('galeri', 'public');
                Foto::create([
                    'galery_id' => $request->galery_id,
                    'file' => $path,
                    'judul' => $request->judul ?? null
                ]);
            }
        }

        return redirect()->route('foto.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Foto $foto)
    {
        $foto->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
