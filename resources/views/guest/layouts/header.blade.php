{{-- Navbar --}}
<nav id="main-navbar" class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm">

    <div class="container mx-auto px-4 py-3 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group transition-all duration-300 hover:scale-105">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" class="w-10 h-12">
                <div>
                    <span class="font-bold text-xl block leading-tight text-gray-900">SMKN 4 Bogor</span>
                    <span class="text-xs opacity-80 block leading-tight text-gray-600">Sekolah Unggulan</span>
                </div>
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden lg:flex items-center space-x-1">
                @php
                $links = [
                ['name' => 'Beranda', 'route' => 'guest.home', 'icon' => 'fas fa-home'],
                ['name' => 'Profil', 'route' => 'guest.profile', 'icon' => 'fas fa-user-graduate'],
                ['name' => 'Galeri', 'route' => 'guest.galeri.index', 'icon' => 'fas fa-images'],
                ['name' => 'Berita', 'route' => 'guest.berita.index', 'icon' => 'fas fa-newspaper'],
                ['name' => 'Kontak', 'route' => 'guest.contact', 'icon' => 'fas fa-phone'],
                ];
                @endphp

                @foreach ($links as $link)
                <a href="{{ route($link['route']) }}"
                    class="nav-desktop-link relative px-4 py-3 rounded-xl transition-all duration-300 group text-gray-700 hover:bg-gray-100 {{ request()->routeIs($link['route']) ? 'bg-gray-100 text-gray-900' : '' }}">
                    <div class="relative flex items-center space-x-2">
                        <i class="{{ $link['icon'] }} text-sm"></i>
                        <span class="font-medium tracking-wide">{{ $link['name'] }}</span>
                    </div>
                    @if(request()->routeIs($link['route']))
                    @endif
                </a>
                @endforeach
            </div>

            {{-- Tombol Toggle Mobile --}}
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn"
                    class="mobile-menu-btn relative w-10 h-10 flex items-center justify-center transition-all duration-300 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700">
                    <span class="sr-only">Toggle menu</span>
                    <div class="w-6 h-6 relative">
                        <span class="absolute top-2 left-0 w-6 h-0.5 bg-gray-700 rounded-full transition-all duration-300"></span>
                        <span class="absolute top-1/2 left-0 w-6 h-0.5 bg-gray-700 rounded-full transition-all duration-300 -translate-y-1/2"></span>
                        <span class="absolute bottom-2 left-0 w-6 h-0.5 bg-gray-700 rounded-full transition-all duration-300"></span>
                    </div>
                </button>
            </div>

        </div>
    </div>

    {{-- Menu Mobile Sidebar --}}
    <div id="mobile-sidebar" class="mobile-sidebar lg:hidden fixed top-0 right-0 h-full w-80 bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex justify-between items-center p-6 border-b border-gray-200">
            <h2 class="text-lg font-bold text-gray-900">Menu</h2>
            <button id="close-sidebar" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                <i class="fas fa-times text-gray-700"></i>
            </button>
        </div>

        <ul class="py-4 space-y-2">
            @foreach ($links as $link)
            <li>
                <a href="{{ route($link['route']) }}"
                    class="mobile-nav-link flex items-center space-x-3 px-6 py-4 transition-all duration-300 group text-gray-700 hover:bg-gray-100 {{ request()->routeIs($link['route']) ? 'bg-gray-100 text-gray-900 border-r-4 border-gray-900' : '' }}">
                    <i class="{{ $link['icon'] }} w-5 text-center"></i>
                    <span class="font-medium">{{ $link['name'] }}</span>
                    @if(request()->routeIs($link['route']))
                    <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    @endif
                </a>
            </li>
            @endforeach

            {{-- CTA Mobile --}}
            <li class="pt-4 mt-4 border-t border-gray-200">
                <a href="#" class="flex items-center justify-center space-x-2 mx-4 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <i class="fas fa-paper-plane"></i>
                    <span>Daftar Sekarang</span>
                </a>
            </li>
        </ul>
    </div>

    {{-- Overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden"></div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
        const hamburgerLines = document.querySelectorAll('.mobile-menu-btn span');

        // Buka sidebar
        function openSidebar() {
            mobileSidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Animasi hamburger ke X
            hamburgerLines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            hamburgerLines[1].style.opacity = '0';
            hamburgerLines[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
        }

        // Tutup sidebar
        function closeSidebarFunc() {
            mobileSidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';

            // Animasi X ke hamburger
            hamburgerLines[0].style.transform = 'none';
            hamburgerLines[1].style.opacity = '1';
            hamburgerLines[2].style.transform = 'none';
        }

        // Event listeners
        mobileMenuBtn.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarFunc);
        sidebarOverlay.addEventListener('click', closeSidebarFunc);

        // Close sidebar ketika klik link
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', closeSidebarFunc);
        });

        // Close dengan ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileSidebar.classList.contains('translate-x-full')) {
                closeSidebarFunc();
            }
        });
    });
</script>

<style>
    [x-cloak] {
        display: none !important;
    }

    html {
        scroll-behavior: smooth;
    }

    /* Pastikan navbar di atas semua elemen */
    #main-navbar {
        z-index: 9999 !important;
    }

    /* Style untuk hamburger lines */
    .mobile-menu-btn span {
        transition: all 0.3s ease;
    }

    /* Pastikan konten tidak tertutup navbar */
    main {
        margin-top: 80px;
    }

    /* Smooth transition untuk sidebar */
    .mobile-sidebar {
        transition: transform 0.3s ease;
    }

    /* Overlay transition */
    #sidebar-overlay {
        transition: opacity 0.3s ease;
    }
</style>