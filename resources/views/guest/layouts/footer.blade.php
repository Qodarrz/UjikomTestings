{{-- Footer --}}
<footer class="bg-gradient-to-r from-gray-900 to-black text-gray-300 mt-16">
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Kolom 1: Tentang Sekolah --}}
        <div class="md:col-span-1">
            <h5 class="text-white font-semibold text-lg mb-4">SMKN 4 Bogor</h5>
            <p class="text-gray-400 leading-relaxed">
                Sekolah Menengah Kejuruan Negeri 4 Bogor - Sekolah unggulan yang menghasilkan lulusan kompeten dan berkarakter.
            </p>
            <div class="flex space-x-3 mt-5">
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-white hover:text-black transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-white hover:text-black transition">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-white hover:text-black transition">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-white hover:text-black transition">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        {{-- Kolom 2: Menu Cepat --}}
        <div>
            <h5 class="text-white font-semibold text-lg mb-4">Menu Cepat</h5>
            <ul class="space-y-2">
                <li><a href="{{ route('guest.home') }}" class="hover:text-white transition">Beranda</a></li>
                <li><a href="{{ route('guest.profile') }}" class="hover:text-white transition">Profil Sekolah</a></li>
                <li><a href="{{ route('guest.galeri.index') }}" class="hover:text-white transition">Galeri</a></li>
                <li><a href="{{ route('guest.berita.index') }}" class="hover:text-white transition">Berita</a></li>
                <li><a href="{{ route('guest.contact') }}" class="hover:text-white transition">Kontak</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Kontak Kami --}}
        <div>
            <h5 class="text-white font-semibold text-lg mb-4">Kontak Kami</h5>
            <ul class="space-y-2">
                <li class="flex items-start gap-2">
                    <i class="fas fa-map-marker-alt mt-1 text-gray-400"></i>
                    <span>Jl. Raya Tajur No. 33, Bogor, Jawa Barat</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-phone text-gray-400"></i>
                    <span>(0251) 8321674</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-envelope text-gray-400"></i>
                    <span>info@smkn4bogor.sch.id</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-clock text-gray-400"></i>
                    <span>Senin - Jumat: 07.00 - 16.00</span>
                </li>
            </ul>
        </div>

        {{-- Kolom 4: Peta Lokasi --}}
        <div>
            <h5 class="text-white font-semibold text-lg mb-4">Lokasi Kami</h5>
            <div class="bg-white/10 rounded-lg overflow-hidden h-48">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.603345596448!2d106.82948627499663!3d-6.571864664221125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4386c2b5a2d%3A0xee0e2b89f2c1b6c5!2sSMKN%204%20Bogor!5e0!3m2!1sid!2sid!4v1690000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="filter grayscale hover:grayscale-0 transition-all duration-300">
                </iframe>
            </div>
            <a href="https://goo.gl/maps/JzGTCfet1brPD44Ar" target="_blank" class="inline-flex items-center gap-2 mt-3 text-sm text-gray-400 hover:text-white transition">
                <i class="fas fa-external-link-alt"></i>
                <span>Buka di Google Maps</span>
            </a>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-gray-700 text-center py-4 text-sm text-gray-400">
        &copy; {{ date('Y') }} <span class="text-white">SMKN 4 Bogor</span>. Semua hak dilindungi.
    </div>
</footer>