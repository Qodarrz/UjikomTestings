@extends('admin.adminlayout')

@section('title', 'Detail Galeri')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">@yield('title')</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.galeri.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 transition">
            <i class="bi bi-arrow-left mr-1"></i> Kembali
        </a>
        <a href="{{ route('admin.foto.create', $galeri->id) }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white transition">
            <i class="bi bi-plus-circle mr-1"></i> Tambah Foto
        </a>
    </div>
</div>

<div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-700">Nama Post: {{ $galeri->post->judul ?? '-' }}</h3>
        <p class="text-sm text-gray-500">Posisi: {{ $galeri->position }}</p>
        <p class="text-sm text-gray-500">Status: {{ $galeri->status ? 'Aktif' : 'Nonaktif' }}</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($galeri->foto as $foto)
        <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
            <img src="{{ asset('storage/' . $foto->file) }}"
                alt="{{ $foto->judul ?? '' }}"
                class="w-full h-48 object-cover">
            <div class="p-2">
                <p class="text-sm text-gray-700 truncate">{{ $foto->judul ?? '-' }}</p>
            </div>
            <form action="{{ route('admin.foto.destroy', $foto->id) }}" method="POST" class="absolute top-2 right-2">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus foto ini?')"
                    class="bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-900 p-2 rounded transition duration-200">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </form>
        </div>
        @empty
        <p class="text-center text-gray-500 py-6 col-span-full">Belum ada foto di galeri ini.</p>
        @endforelse
    </div>
</div>
@endsection