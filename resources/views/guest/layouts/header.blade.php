{{-- Navbar --}}
<nav
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.pageYOffset > 50"
    class="fixed bg-white top-0 left-0 w-full z-50 transition-all duration-500">
    <div class="container mx-auto px-4 py-3 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">

            {{-- Brand dengan animasi --}}
            <a
                href="{{ url('/') }}"
                class="flex items-center space-x-3 group transition-all duration-300 hover:scale-105">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo SMKN 4 Bogor"
                    class="w-10 h-12 transition-all duration-300"
                    :class="scrolled ? 'border-gray-300' : 'border-white'" />
                
                <div>
                    <span class="font-bold text-xl block leading-tight transition-colors duration-300" 
                          :class="scrolled ? 'text-gray-800' : 'text-white'">
                        SMKN 4 Bogor
                    </span>
                    <span class="text-xs opacity-80 block leading-tight transition-colors duration-300" 
                          :class="scrolled ? 'text-gray-600' : 'text-white/80'">
                        Sekolah Unggulan
                    </span>
                </div>
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden lg:flex items-center space-x-1">
                @php
                $links = [
                ['name' => 'Beranda', 'route' => 'guest.home', 'icon' => 'fas fa-home'],
                ['name' => 'Profil', 'route' => 'guest.profile', 'icon' => 'fas fa-user-graduate'],
                ['name' => 'Galeri', 'route' => 'guest.galeri', 'icon' => 'fas fa-images'],
                ['name' => 'Berita', 'route' => 'guest.posts', 'icon' => 'fas fa-newspaper'],
                ['name' => 'Kontak', 'route' => 'guest.contact', 'icon' => 'fas fa-phone'],
                ];
                @endphp

                @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="relative px-4 py-3 rounded-xl transition-all duration-300 group"
                    :class="scrolled ? 
                            '{{ request()->routeIs($link['route']) ? 'bg-accent text-white shadow-lg' : 'text-gray-700 hover:bg-gray-100' }}' : 
                            '{{ request()->routeIs($link['route']) ? 'bg-white/20 text-white shadow-lg' : 'text-white/90 hover:bg-white/10' }}'">
                    
                    <div class="relative flex items-center space-x-2">
                        <i class="{{ $link['icon'] }} text-sm transition-transform duration-300 group-hover:scale-110"></i>
                        <span class="font-medium tracking-wide">{{ $link['name'] }}</span>
                    </div>

                    {{-- Active indicator --}}
                    @if(request()->routeIs($link['route']))
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-accent rounded-full"></div>
                    @endif
                </a>
                @endforeach
            </div>

        <!-- Tombol Toggle Mobile -->
<button
    @click="open = !open"
    class="lg:hidden relative w-10 h-10 flex flex-col items-center justify-center transition-all duration-300 rounded-xl focus:outline-none"
    :class="scrolled ? 'bg-gray-100 hover:bg-gray-200' : 'bg-white/10 hover:bg-white/20'"
    aria-label="Toggle Menu">

    <span class="sr-only">Toggle menu</span>

    <!-- Garis atas -->
    <span class="absolute w-5 h-0.5 rounded-full transition-all duration-300 origin-center"
        :class="scrolled ? 'bg-gray-800' : 'bg-white'"
        :style="open ? 'transform: rotate(45deg) translate(4px, 5px);' : 'transform: translateY(-6px);'">
    </span>

    <!-- Garis tengah -->
    <span class="absolute w-5 h-0.5 rounded-full transition-all duration-300 origin-center"
        :class="scrolled ? 'bg-gray-800' : 'bg-white'"
        :style="open ? 'opacity: 0;' : 'opacity: 1;'">
    </span>

    <!-- Garis bawah -->
    <span class="absolute w-5 h-0.5 rounded-full transition-all duration-300 origin-center"
        :class="scrolled ? 'bg-gray-800' : 'bg-white'"
        :style="open ? 'transform: rotate(-45deg) translate(4px, -5px);' : 'transform: translateY(6px);'">
    </span>
</button>

        </div>

        {{-- Menu Mobile --}}
        <div x-cloak
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4"
            @click.away="open = false"
            class="lg:hidden mt-4 rounded-2xl overflow-hidden shadow-2xl border"
            :class="scrolled ? 'bg-white border-gray-200' : 'bg-primary/95 border-white/20 backdrop-blur-xl'">
            
            <ul class="py-2 space-y-1">
                @foreach ($links as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        @click="open = false"
                        class="flex items-center space-x-3 px-6 py-4 transition-all duration-300 group"
                        :class="scrolled ? 
                                '{{ request()->routeIs($link['route']) ? 'bg-accent text-white' : 'text-gray-700 hover:bg-gray-50' }}' : 
                                '{{ request()->routeIs($link['route']) ? 'bg-white/20 text-white' : 'text-white/90 hover:bg-white/10' }}'">
                        <i class="{{ $link['icon'] }} w-5 text-center transition-transform duration-300 group-hover:scale-110"></i>
                        <span class="font-medium">{{ $link['name'] }}</span>
                        @if(request()->routeIs($link['route']))
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                        @endif
                    </a>
                </li>
                @endforeach

                {{-- CTA Mobile --}}
                <li class="pt-2 border-t" :class="scrolled ? 'border-gray-200' : 'border-white/20'">
                    <a
                        href="#"
                        @click="open = false"
                        class="flex items-center justify-center space-x-2 mx-4 px-6 py-3 bg-gradient-to-r from-accent to-accent-dark text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                        <i class="fas fa-paper-plane"></i>
                        <span>Daftar Sekarang</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Tambahkan style untuk x-cloak --}}
<style>
    [x-cloak] { display: none !important; }
</style>