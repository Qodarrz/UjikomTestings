@extends('admin.adminlayout')

@section('title', 'Tambah Data')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Tambah @yield('title')</h2>
    <a href="{{ route($routePrefix . '.index') }}" 
       class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm transition">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <form action="{{ route($routePrefix . '.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        @foreach ($fields as $name => $type)
            <div>
                <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ ucfirst($name) }}
                </label>

                @if ($type == 'textarea')
                    <textarea 
                        name="{{ $name }}" 
                        id="{{ $name }}" 
                        rows="4" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                @elseif ($type == 'file')
                    <input 
                        type="file" 
                        name="{{ $name }}" 
                        id="{{ $name }}" 
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                @else
                    <input 
                        type="{{ $type }}" 
                        name="{{ $name }}" 
                        id="{{ $name }}" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                @endif

                @error($name)
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endforeach

        <div class="pt-3">
            <button type="submit" 
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow transition">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
