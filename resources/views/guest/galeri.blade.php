@extends('guest.layouts.app')

@section('title', 'Galeri - SMKN 4 Bogor')

@section('content')
{{-- Hero Section --}}
<div class="relative bg-gradient-to-r from-blue-800 to-indigo-900 text-white py-16 md:py-20">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri SMKN 4 Bogor</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto">Kumpulan momen berharga dan kegiatan sekolah yang menginspirasi</p>
    </div>
</div>

{{-- Filter Kategori --}}
<section class="py-8 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active px-6 py-2 bg-blue-600 text-white rounded-full font-medium transition-all duration-300 hover:bg-blue-700" data-filter="all">
                Semua Album
            </button>
            <button class="filter-btn px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium transition-all duration-300 hover:bg-gray-100" data-filter="kegiatan">
                Kegiatan Sekolah
            </button>
            <button class="filter-btn px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium transition-all duration-300 hover:bg-gray-100" data-filter="prestasi">
                Prestasi
            </button>
            <button class="filter-btn px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium transition-all duration-300 hover:bg-gray-100" data-filter="fasilitas">
                Fasilitas
            </button>
            <button class="filter-btn px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium transition-all duration-300 hover:bg-gray-100" data-filter="acara">
                Acara Khusus
            </button>
        </div>
    </div>
</section>

{{-- Daftar Galeri --}}
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8" id="gallery-container">
            
            {{-- Album 1 --}}
            <div class="gallery-item group" data-category="kegiatan">
                <a href="{{ route('guest.galeri.detail', 'pelantikan-paskibra') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/paskibra-cover.jpg" alt="Pelantikan Paskibra" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">Kegiatan</span>
                            </div>
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition duration-300"></div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Pelantikan Paskibra 2024</h3>
                            <p class="text-gray-600 text-sm mb-3">Momen pelantikan anggota Paskibra periode 2023-2024</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>25 Foto</span>
                                <span>15 Mar 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 2 --}}
            <div class="gallery-item group" data-category="prestasi">
                <a href="{{ route('guest.galeri.detail', 'olimpiade-sains') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/olimpiade-cover.jpg" alt="Olimpiade Sains" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-medium">Prestasi</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Olimpiade Sains Nasional</h3>
                            <p class="text-gray-600 text-sm mb-3">Perolehan medali emas di Olimpiade Sains Tingkat Provinsi</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>18 Foto</span>
                                <span>10 Feb 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 3 --}}
            <div class="gallery-item group" data-category="fasilitas">
                <a href="{{ route('guest.galeri.detail', 'lab-komputer-baru') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/lab-komputer-cover.jpg" alt="Lab Komputer Baru" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-medium">Fasilitas</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Lab Komputer Terbaru</h3>
                            <p class="text-gray-600 text-sm mb-3">Fasilitas lab komputer dengan spesifikasi terkini</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>12 Foto</span>
                                <span>5 Jan 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 4 --}}
            <div class="gallery-item group" data-category="acara">
                <a href="{{ route('guest.galeri.detail', 'wisuda-2024') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/wisuda-cover.jpg" alt="Wisuda 2024" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium">Acara</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Wisuda Angkatan 2024</h3>
                            <p class="text-gray-600 text-sm mb-3">Momen pelepasan siswa kelas XII tahun ajaran 2023/2024</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>45 Foto</span>
                                <span>20 Mei 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 5 --}}
            <div class="gallery-item group" data-category="kegiatan">
                <a href="{{ route('guest.galeri.detail', 'praktek-industri') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/praktek-cover.jpg" alt="Praktek Industri" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">Kegiatan</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Praktek Kerja Industri</h3>
                            <p class="text-gray-600 text-sm mb-3">Siswa magang di berbagai perusahaan mitra sekolah</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>32 Foto</span>
                                <span>8 Apr 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 6 --}}
            <div class="gallery-item group" data-category="prestasi">
                <a href="{{ route('guest.galeri.detail', 'lomba-robotik') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/robotik-cover.jpg" alt="Lomba Robotik" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-medium">Prestasi</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Lomba Robotik Regional</h3>
                            <p class="text-gray-600 text-sm mb-3">Tim robotik sekolah meraih juara 1 tingkat regional</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>21 Foto</span>
                                <span>12 Mar 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 7 --}}
            <div class="gallery-item group" data-category="fasilitas">
                <a href="{{ route('guest.galeri.detail', 'perpustakaan-digital') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/perpus-cover.jpg" alt="Perpustakaan Digital" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-medium">Fasilitas</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Perpustakaan Digital</h3>
                            <p class="text-gray-600 text-sm mb-3">Transformasi perpustakaan konvensional menjadi digital</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>15 Foto</span>
                                <span>28 Feb 2024</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Album 8 --}}
            <div class="gallery-item group" data-category="acara">
                <a href="{{ route('guest.galeri.detail', 'hari-guru') }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img src="/images/galeri/hari-guru-cover.jpg" alt="Hari Guru Nasional" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium">Acara</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-blue-600 transition">Peringatan Hari Guru</h3>
                            <p class="text-gray-600 text-sm mb-3">Perayaan Hari Guru Nasional 2023 di lingkungan sekolah</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>28 Foto</span>
                                <span>25 Nov 2023</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-12">
            <button id="load-more" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300 shadow-md">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

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
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
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
        
        itemsToShow.forEach(item => {
            item.classList.remove('hidden');
        });

        // Hide load more button if no more items
        if (document.querySelectorAll('.gallery-item.hidden').length === 0) {
            loadMoreBtn.style.display = 'none';
        }
    });
});
</script>
@endsection