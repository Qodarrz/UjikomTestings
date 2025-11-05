<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $routePrefix = 'admin.kategori';
    protected $viewPath = 'admin.kategori';

    public function index()
    {
        $data = Kategori::all();

        $columns = ['judul'];
        $routePrefix = 'admin.kategori';

        return view('admin.kategori.index', compact('data', 'columns', 'routePrefix'));
    }

    public function create()
    {
        $routePrefix = $this->routePrefix;
        $fields = [
            'judul' => 'text',
        ];
        return view($this->viewPath . '.create', compact('routePrefix', 'fields'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        Kategori::create($request->only('judul'));

        return redirect()
            ->route($this->routePrefix . '.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        $routePrefix = $this->routePrefix;

        $fields = [
            'judul' => 'text',
        ];

        $item = $kategori;

        return view($this->viewPath . '.edit', compact('item', 'fields', 'routePrefix'));
    }


    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori->update($request->only('judul'));

        return redirect()
            ->route($this->routePrefix . '.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route($this->routePrefix . '.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
