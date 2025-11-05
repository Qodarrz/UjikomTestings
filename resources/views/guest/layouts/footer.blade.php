{{-- Footer --}}
<footer class="bg-gradient-to-r from-gray-900 to-black text-gray-300 mt-16">
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Kolom 1: Tentang --}}
        <div>
            <h5 class="text-white font-semibold text-lg mb-4">Desa Kita</h5>
            <p class="text-gray-400 leading-relaxed">
                Desa mandiri, berbudaya, dan sejahtera bersama masyarakat.
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
                <li><a href="{{ route('guest.home') }}" class="hover:text-white transition">Home</a></li>
                <li><a href="{{ route('guest.profile') }}" class="hover:text-white transition">Profil Desa</a></li>
                <li><a href="{{ route('guest.galeri') }}" class="hover:text-white transition">Galeri</a></li>
                <li><a href="{{ route('guest.posts') }}" class="hover:text-white transition">Berita</a></li>
                <li><a href="{{ route('guest.contact') }}" class="hover:text-white transition">Kontak</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Kontak Kami --}}
        <div>
            <h5 class="text-white font-semibold text-lg mb-4">Kontak Kami</h5>
            <ul class="space-y-2">
                <li class="flex items-start gap-2">
                    <i class="fas fa-map-marker-alt mt-1 text-gray-400"></i>
                    <span>Jl. Desa No. 123, Kecamatan, Kabupaten</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-phone text-gray-400"></i>
                    <span>(021) 1234-5678</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-envelope text-gray-400"></i>
                    <span>info@desakita.id</span>
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-gray-700 text-center py-4 text-sm text-gray-400">
        &copy; {{ date('Y') }} <span class="text-white">Desa Kita</span>. Semua hak dilindungi.
    </div>
</footer>
