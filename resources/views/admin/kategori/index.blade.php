@extends('admin.adminlayout')

@section('title', 'Data')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Daftar @yield('title')</h2>
    <a href="{{ route($routePrefix . '.create') }}" 
       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
        <i class="bi bi-plus-circle"></i>
        Tambah Data
    </a>
</div>

{{-- Notifikasi sukses --}}
@if (session('success'))
    <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded-xl overflow-hidden">
    <div class="p-4 overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <th class="py-3 px-4 border-b border-gray-200">No</th>
                    @foreach ($columns as $col)
                        <th class="py-3 px-4 border-b border-gray-200">{{ ucfirst($col) }}</th>
                    @endforeach
                    <th class="py-3 px-4 border-b border-gray-200 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 border-b border-gray-100">{{ $index + 1 }}</td>
                        @foreach ($columns as $col)
                            <td class="py-3 px-4 border-b border-gray-100">{{ $item->$col }}</td>
                        @endforeach
                        <td class="py-3 px-4 border-b border-gray-100 text-center">
                            <a href="{{ route($routePrefix . '.edit', $item->id) }}" 
                               class="inline-flex items-center justify-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm transition">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="inline-flex items-center justify-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + 2 }}" 
                            class="py-6 px-4 text-center text-gray-500 italic">
                            Belum ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
