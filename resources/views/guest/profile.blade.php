@extends('guest.layouts.app')

@section('title', 'Profil Sekolah - SMKN 4 Bogor')

@section('content')
{{-- Hero Section --}}
<div class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white py-16 md:py-24">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-12">
            {{-- Foto Kepala Sekolah --}}
            <div class="lg:w-2/5 flex justify-center">
                <div class="relative">
                    <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-white/30 shadow-2xl">
                        <img src="{{ $profileData['foto_kepala_sekolah']->isi ?? '/images/sekolah/kepala-sekolah.jpg' }}" 
                             alt="Kepala Sekolah SMKN 4 Bogor" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-blue-900 font-bold py-1 px-4 rounded-full text-sm shadow-lg">
                        Kepala Sekolah
                    </div>
                </div>
            </div>
            
            {{-- Konten Teks --}}
            <div class="lg:w-3/5 text-center lg:text-left">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">Profil SMKN 4 Bogor</h1>
                <div class="mb-6">
                    <h2 class="text-xl md:text-2xl font-semibold text-yellow-300 mb-2">
                        {{ $profileData['nama_kepala_sekolah']->isi ?? 'Drs. H. Ahmad Suryana, M.Pd' }}
                    </h2>
                    <p class="text-blue-200">Kepala SMKN 4 Bogor</p>
                </div>
                <p class="text-lg md:text-xl mb-8 leading-relaxed max-w-2xl">
                    {{ $profileData['tagline']->isi ?? 'Sekolah Unggul Berbasis Teknologi, Lingkungan, dan Karakter yang telah menghasilkan lulusan kompeten dan berdaya saing tinggi di dunia kerja sejak tahun 1980.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#visi-misi"
                       class="inline-block bg-white text-blue-700 font-semibold px-6 py-3 rounded-full shadow-lg hover:-translate-y-1 transition duration-300">
                       Lihat Visi & Misi
                    </a>
                    <a href="#sejarah"
                       class="inline-block border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white/10 transition duration-300">
                       Sejarah Sekolah
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Dekorasi --}}
    <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white/10 to-transparent"></div>
</div>

{{-- Sejarah Sekolah --}}
<section id="sejarah" class="py-12 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10">
            <div class="md:w-1/2">
                <img src="{{ $profileData['foto_gedung']->isi ?? '/images/sekolah/gedung.jpg' }}" 
                     alt="Gedung SMKN 4 Bogor"
                     class="rounded-2xl shadow-lg w-full h-auto object-cover">
            </div>
            <div class="md:w-1/2 text-gray-700">
                <h2 class="text-2xl md:text-4xl font-bold text-black mb-4">Sejarah Singkat</h2>
                <div class="leading-relaxed font-medium">
                    {!! $profileData['sejarah']->isi ?? '
                    <p class="mb-4">SMKN 4 Bogor berdiri pada tahun 1980 sebagai bagian dari upaya pemerintah dalam meningkatkan mutu pendidikan kejuruan di Kota Bogor. Seiring waktu, sekolah ini berkembang menjadi salah satu SMK unggulan dengan berbagai jurusan yang relevan dengan kebutuhan industri.</p>
                    <p>Berlokasi strategis di tengah kota, SMKN 4 Bogor telah menghasilkan ribuan lulusan kompeten dan berdaya saing tinggi di dunia kerja.</p>
                    ' !!}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
<section id="visi-misi" class="py-16 md:py-24 bg-gray-100">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-black mb-10">Visi & Misi</h2>
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-10 text-gray-700">
            <h3 class="text-xl md:text-2xl font-semibold text-blue-700 mb-4">Visi</h3>
            <p class="italic font-medium mb-8 text-gray-800">
                "{{ $profileData['visi']->isi ?? 'Menjadi SMK Unggul yang Berbudaya Lingkungan dan Berdaya Saing Global.' }}"
            </p>

            <h3 class="text-xl md:text-2xl font-semibold text-blue-700 mb-4">Misi</h3>
            <div class="text-left font-medium">
                @if(isset($profileData['misi']))
                    {!! $profileData['misi']->isi !!}
                @else
                    <ul class="list-disc list-inside space-y-2">
                        <li>Menyelenggarakan pendidikan dan pelatihan berbasis kompetensi sesuai kebutuhan dunia kerja.</li>
                        <li>Meningkatkan profesionalisme tenaga pendidik dan kependidikan.</li>
                        <li>Membentuk peserta didik berkarakter disiplin, tangguh, dan peduli lingkungan.</li>
                        <li>Menjalin kerjasama dengan dunia industri dan lembaga pendidikan tinggi.</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Fasilitas Sekolah --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-center text-3xl md:text-4xl font-bold text-black mb-12">Fasilitas Sekolah</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 text-center">
            @php
                $fasilitas = [];
                if(isset($profileData['fasilitas'])) {
                    $fasilitas = json_decode($profileData['fasilitas']->isi, true);
                } else {
                    $fasilitas = [
                        ['nama' => 'Laboratorium Komputer', 'gambar' => '/images/fasilitas/labkom.jpg'],
                        ['nama' => 'Bengkel Otomotif', 'gambar' => '/images/fasilitas/bengkel.jpg'],
                        ['nama' => 'Perpustakaan', 'gambar' => '/images/fasilitas/perpustakaan.jpg'],
                        ['nama' => 'Masjid Sekolah', 'gambar' => '/images/fasilitas/masjid.jpg']
                    ];
                }
            @endphp
            
            @foreach($fasilitas as $fasilitasItem)
            <div class="rounded-2xl shadow p-6 hover:-translate-y-1 transition">
                <img src="{{ $fasilitasItem['gambar'] }}" 
                     class="w-20 h-20 mx-auto mb-4 rounded-lg object-cover" 
                     alt="{{ $fasilitasItem['nama'] }}">
                <p class="font-semibold text-gray-800">{{ $fasilitasItem['nama'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection