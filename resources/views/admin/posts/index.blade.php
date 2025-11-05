@extends('admin.adminlayout')

@section('title', 'Daftar Data')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">
        Daftar @yield('title')
    </h2>
    <a href="{{ route($routePrefix . '.create') }}" 
       class="inline-flex items-center px-4 py-2 text-white bg-primary hover:bg-primary-dark rounded-lg shadow transition">
        <i class="bi bi-plus-circle mr-2"></i> Tambah Data
    </a>
</div>

@if (session('success'))
    <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-neutral-light">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                    @foreach ($columns as $col)
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                            {{ ucfirst($col) }}
                        </th>
                    @endforeach
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($posts as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                        @foreach ($columns as $col)
                            <td class="px-4 py-3 text-sm text-gray-700">
                                {{-- Handle relasi secara dinamis --}}
                                @if ($col === 'kategori')
                                    {{ $item->kategori->judul ?? '-' }}
                                @elseif ($col === 'petugas')
                                    {{ $item->petugas->username ?? '-' }}
                                @else
                                    {{ $item->$col }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route($routePrefix . '.edit', $item->id) }}" 
                                   class="px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-md shadow transition">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 text-sm text-white bg-red-600 hover:bg-red-700 rounded-md shadow transition">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + 2 }}" 
                            class="px-4 py-5 text-center text-gray-500 text-sm italic">
                            Belum ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
