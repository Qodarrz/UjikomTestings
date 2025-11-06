@extends('admin.adminlayout')

@section('title', 'Tambah Foto')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Tambah Foto untuk Galeri: {{ $galeri->post->judul ?? '-' }}</h2>
    <a href="{{ route('admin.galeri.show', $galeri->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
        <i class="bi bi-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route($routePrefix . '.store', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="judul" class="block text-gray-700 font-medium mb-2">Judul (opsional)</label>
            <input type="text" name="judul" id="judul" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('judul') }}">
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="files" class="block text-gray-700 font-medium mb-2">Pilih Foto</label>
            <input type="file" name="files[]" id="files" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" multiple>
            @error('files.*')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            <i class="bi bi-save mr-2"></i> Simpan
        </button>
    </form>
</div>
@endsection
