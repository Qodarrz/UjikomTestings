@extends('guest.layouts.app')

@section('title', 'Beranda - SMKN 4 Bogor')

@section('content')
{{-- Hero section --}}
<div class="hero relative text-center text-white py-16 md:py-28"
    style="background: url('/images/herosection.jpg') center/cover no-repeat;">
    <!-- Overlay gradient -->
    <div class="absolute inset-0 bg-linear-to-t from-black via-black/60 to-transparent"></div>

    <div class="relative max-w-3xl mx-auto px-4">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Selamat Datang di <br> SMKN 4 Bogor</h1>
        <p class="text-base md:text-xl mb-8">Mewujudkan Pendidikan Berkualitas, Berkarakter, dan Berwawasan Lingkungan</p>
    </div>
</div>

<div class="py-12 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-start text-2xl md:text-6xl font-bold text-black mb-8 md:mb-12">Tentang SMKN 4 Bogor</h2>
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
            <div class="md:w-2/3 text-gray-600">
                <p class="mb-4 font-medium leading-relaxed">SMKN 4 Bogor merupakan salah satu sekolah menengah kejuruan terkemuka di Kota Bogor yang telah berdiri sejak tahun 1980. Kami berkomitmen untuk menghasilkan lulusan yang kompeten, berkarakter kuat, dan siap bersaing di dunia kerja.</p>
                <p class="mb-4 font-medium leading-relaxed">Dengan fasilitas yang lengkap dan tenaga pengajar yang profesional, kami menyelenggarakan pendidikan berbasis kompetensi yang mengintegrasikan pengetahuan, keterampilan, dan sikap kerja sesuai dengan perkembangan industri.</p>
                <p class="font-medium">Visi kami adalah <span class="italic text-blue-800">"Menjadi SMK Unggul yang Berbudaya Lingkungan dan Berdaya Saing Global"</span>.</p>
            </div>
            <div class="md:w-1/3 flex justify-center md:justify-end mt-6 md:mt-0">
                <img src="/images/sekolah/kepala-sekola.jpg" alt="Kepala Sekolah" class="rounded-xl w-full max-w-xs md:w-64 h-auto object-cover shadow-lg">
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-100 py-16 md:py-32">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-6xl font-bold text-black mb-12 md:mb-24">Jurusan Unggulan</h2>
        <div class="grid grid-cols-2 md:flex md:flex-wrap justify-center gap-8 md:gap-18">
            <div class="flex flex-col items-center">
                <img src="/images/tpfl.png" alt="Rekayasa Perangkat Lunak" class="w-24 h-24 md:w-32 md:h-32 object-cover mb-4">
                <p class="text-black font-semibold text-sm md:text-base">Teknik Pengalasan & Fabrikasi Logam</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="/images/TO.png" alt="Teknik Kendaraan Ringan" class="w-24 h-24 md:w-32 md:h-32 object-cover mb-4">
                <p class="text-black font-semibold text-sm md:text-base">Teknik Otomotif</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="/images/tjkt.png" alt="Akuntansi" class="w-24 h-24 md:w-32 md:h-32 object-cover mb-4">
                <p class="text-black font-semibold text-sm md:text-base">Teknik Jaringan Komputer</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="/images/pplg.png" alt="PPLG" class="w-24 h-24 md:w-32 md:h-32 object-cover mb-4">
                <p class="text-black font-semibold text-sm md:text-base">Pengembangan Perangkat Lunak & Gim</p>
            </div>
        </div>
    </div>
</div>

{{-- Galeri foto terbaru --}}
<div class="py-12 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-center text-2xl md:text-6xl font-bold text-black mb-6 md:mb-24">Galeri Terbaru</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @forelse($fotoTerbaru as $foto)
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('storage/' . $foto->file) }}" alt="{{ $foto->judul }}" class="h-40 md:h-52 w-full object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-black text-sm md:text-base">{{ $foto->judul }}</p>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 col-span-4">Belum ada foto yang diunggah.</p>
            @endforelse
        </div>
        <div class="text-center mt-6 md:mt-8">
            <a href="{{ route('guest.galeri.index') }}" class="inline-block bg-blue-700 text-white px-6 py-2 md:px-8 md:py-3 rounded-full hover:bg-blue-800 transition duration-300">Lihat Semua Galeri</a>
        </div>
    </div>
</div>

{{-- Prestasi --}}
<div class="py-12 md:py-16 bg-grey-100">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-center text-2xl md:text-6xl font-bold text-black mb-6 md:mb-8">Berita Terbaru</h2>
        <div class="grid md:grid-cols-2 gap-4 md:gap-6">
            <div class="bg-white rounded-2xl shadow p-4 md:p-6 hover:-translate-y-1 transition duration-300">
                <h5 class="text-blue-700 font-semibold mb-2 text-base md:text-lg">Juara 1 Lomba Kompetensi Siswa Tingkat Nasional 2023</h5>
                <p class="text-gray-700 text-sm md:text-base">Bidang Teknik Kendaraan Ringan - atas nama Ahmad Fauzi</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 md:p-6 hover:-translate-y-1 transition duration-300">
                <h5 class="text-blue-700 font-semibold mb-2 text-base md:text-lg">Sekolah Adiwiyata Tingkat Provinsi 2023</h5>
                <p class="text-gray-700 text-sm md:text-base">Penghargaan untuk komitmen dalam pelestarian lingkungan</p>
            </div>
        </div>
    </div>
</div>
@endsection