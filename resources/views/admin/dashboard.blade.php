@extends('admin.adminlayout')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard Admin</h2>
        <p class="text-gray-500">Kelola konten website galeri sekolah dengan mudah</p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <i class="bi bi-folder text-3xl text-blue-600"></i>
            <h3 class="text-2xl font-bold mt-2">{{ $totalKategori }}</h3>
            <p class="text-gray-600">Kategori</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <i class="bi bi-images text-3xl text-blue-600"></i>
            <h3 class="text-2xl font-bold mt-2">{{ $totalGaleri }}</h3>
            <p class="text-gray-600">Galeri</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <i class="bi bi-file-text text-3xl text-blue-600"></i>
            <h3 class="text-2xl font-bold mt-2">{{ $totalPost }}</h3>
            <p class="text-gray-600">Postingan</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <i class="bi bi-collection text-3xl text-blue-600"></i>
            <h3 class="text-2xl font-bold mt-2">{{ $totalFoto }}</h3>
            <p class="text-gray-600">Foto</p>
        </div>
    </div>

    {{-- Welcome Card --}}
    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
        <h5 class="text-lg font-semibold text-gray-800">Selamat datang, {{ $petugas->username }}!</h5>
        <p class="text-gray-600 mt-2 leading-relaxed">
            Gunakan menu di samping untuk mengelola konten website galeri sekolah.
            Anda dapat menambah, mengedit, atau menghapus kategori, galeri, postingan, dan profil sekolah.
        </p>
        <a href="{{ route('admin.kategori.index') }}" 
           class="inline-block mt-4 bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium transition">
           Mulai Kelola Konten
        </a>
    </div>
@endsection
