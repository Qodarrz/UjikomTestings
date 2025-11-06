@extends('admin.adminlayout')

@section('title', 'Daftar Galeri')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">@yield('title')</h2>
    <a href="{{ route($routePrefix . '.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-200">
        <i class="ri-add-circle-line mr-2"></i> Tambah Galeri
    </a>
</div>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($galeri as $item)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden relative">
            {{-- Card clickable menuju show --}}
            <a href="{{ route($routePrefix . '.show', $item->id) }}" class="block">
                <div class="h-32 bg-gray-100 flex items-center justify-center">
                    <span class="text-gray-400">Foto Galeri</span>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->post->judul ?? '-' }}</h3>
                    <p class="text-sm text-gray-500">Posisi: {{ $item->position }}</p>
                    <p class="text-sm text-gray-500">Status: {{ $item->status ? 'Aktif' : 'Nonaktif' }}</p>
                </div>
            </a>

            {{-- Tombol delete di pojok kanan bawah --}}
            <form action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST" class="absolute top-2 right-2">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded transition duration-200">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </form>
        </div>
    @empty
        <p class="col-span-1 text-center text-gray-500">Belum ada data galeri.</p>
    @endforelse
</div>
@endsection
