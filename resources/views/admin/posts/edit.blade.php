@extends('admin.adminlayout')

@section('title', 'Edit Data')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Edit @yield('title')</h2>
        <a href="{{ route($routePrefix . '.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
            <i class="bi bi-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <form action="{{ route($routePrefix . '.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        @foreach ($fields as $name => $type)
            <div>
                <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ ucfirst(str_replace('_', ' ', $name)) }}
                </label>

                {{-- Textarea --}}
                @if ($type === 'textarea')
                    <textarea id="{{ $name }}" name="{{ $name }}" rows="4"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm">{{ old($name, $post->$name) }}</textarea>

                {{-- File Upload --}}
                @elseif ($type === 'file')
                    <input type="file" id="{{ $name }}" name="{{ $name }}"
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-primary focus:border-primary" />
                    
                    @if($post->$name)
                        <div class="mt-2">
                            <p class="text-xs text-gray-500 mb-1">File saat ini:</p>
                            <img src="{{ asset('storage/' . $post->$name) }}" alt="Thumbnail" class="h-24 rounded-md border">
                        </div>
                    @endif

                {{-- Select Kategori --}}
                @elseif ($type === 'select' && $name === 'kategori_id')
                    <select id="{{ $name }}" name="{{ $name }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old($name, $post->kategori_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->judul }}
                            </option>
                        @endforeach
                    </select>

                {{-- Select Status --}}
                @elseif ($type === 'select' && $name === 'status')
                    <select id="{{ $name }}" name="{{ $name }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status', $post->status) === 'publish' ? 'selected' : '' }}>Publish</option>
                    </select>

                {{-- Input Umum --}}
                @else
                    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
                        value="{{ old($name, $post->$name) }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm" />
                @endif
            </div>
        @endforeach

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route($routePrefix . '.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
               Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                <i class="bi bi-save mr-1"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
