<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPost = Post::count();
        $totalGaleri = Galery::count();
        $totalFoto = Foto::count();
        $totalKategori = Kategori::count();

        $petugas = Auth::guard('petugas')->user();

        return view('admin.dashboard', compact(
            'totalPost',
            'totalGaleri',
            'totalFoto',
            'totalKategori',
            'petugas'
        ));
    }
}
