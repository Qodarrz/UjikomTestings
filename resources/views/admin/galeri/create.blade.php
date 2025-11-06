@extends('admin.adminlayout')

@section('title', 'Tambah Galeri')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h2 class="text-2xl font-semibold text-gray-800">@yield('title')</h2>
    <a href="{{ route($routePrefix . '.index') }}" 
       class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
        <i class="bi bi-arrow-left mr-1"></i> Kembali
    </a>
</div>

<div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-100">
    <form action="{{ route($routePrefix . '.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Pilihan Post --}}
        <div>
            <label for="post_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Post</label>
            <select name="post_id" id="post_id" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition text-gray-700">
                <option value="">-- Pilih Post --</option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->judul }}</option>
                @endforeach
            </select>
            @error('post_id')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Posisi --}}
        <div>
            <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">Posisi</label>
            <input type="number" name="position" id="position" placeholder="Contoh: 1, 2, 3"
                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition text-gray-700 placeholder-gray-400">
            @error('position')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status --}}
        <div>
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
            <select name="status" id="status"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition text-gray-700">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
            @error('status')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Simpan --}}
        <div class="pt-4 flex justify-end">
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                <i class="bi bi-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
