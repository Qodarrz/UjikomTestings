@extends('guest.layouts.app')

@section('title', 'Galeri - SMKN 4 Bogor')

@section('content')
{{-- Hero Section --}}
<div class="relative bg-white max-w-6xl mx-auto px-4 text-start">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri SMKN 4 Bogor</h1>
    <p class="text-xl md:text-2xl max-w-3xl mx-auto">Kumpulan momen berharga dan kegiatan sekolah yang menginspirasi</p>
</div>


{{-- Daftar Galeri --}}
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8" id="gallery-container">

            @foreach($galeri as $album)
            @php
            $galeryPertama = $album->galery->first();
            $fotoUtama = $galeryPertama ? $galeryPertama->foto->first() : null;
            @endphp

            <div class="gallery-item group" data-category="{{ $album->kategori->judul ?? 'all' }}">
                <a href="{{ route('guest.galeri.show', $album->id) }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="{{ $fotoUtama ? asset('storage/' . $fotoUtama->file) : asset('images/default-album.jpg') }}"
                                alt="{{ $album->judul }}"
                                class="w-full h-48 object-cover transition duration-500">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition duration-300"></div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">
                                {{ $album->judul }}
                            </h3>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>{{ $galeryPertama ? $galeryPertama->foto->count() : 0 }} Foto</span>
                                <span>{{ $album->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-12">
            <button id="load-more" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300 shadow-md">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

{{-- Styles --}}
<style>
    .filter-btn.active {
        background-color: #2563eb;
        color: white;
    }

    .gallery-item {
        opacity: 1;
        transform: translateY(0);
        transition: all 0.3s ease;
    }

    .gallery-item.hidden {
        opacity: 0;
        transform: translateY(20px);
        display: none;
    }
</style>

{{-- Scripts --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        const loadMoreBtn = document.getElementById('load-more');
        let visibleItems = 8;

        // Filter functionality
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });

        // Load more functionality
        loadMoreBtn.addEventListener('click', function() {
            const hiddenItems = document.querySelectorAll('.gallery-item.hidden');
            const itemsToShow = Array.from(hiddenItems).slice(0, 4);

            itemsToShow.forEach(item => item.classList.remove('hidden'));

            if (document.querySelectorAll('.gallery-item.hidden').length === 0) {
                loadMoreBtn.style.display = 'none';
            }
        });
    });
</script>
@endsection