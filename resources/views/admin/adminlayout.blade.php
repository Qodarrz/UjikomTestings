<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside 
            class="w-64 bg-primary text-white flex flex-col justify-between fixed md:relative z-40 md:z-auto"
        >
            <div>
                {{-- Header --}}
                <div class="p-6 border-b border-white/10 text-center">
                    <h1 class="text-2xl font-bold">Admin Panel</h1>
                    <p class="text-sm opacity-80 mt-1">{{ auth('petugas')->user()->username ?? 'Admin' }}</p>
                </div>

                {{-- Menu --}}
                <nav class="mt-6 space-y-1 px-3">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                        {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-yellow-400' : 'hover:bg-white/10 hover:text-yellow-400' }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.kategori.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                        {{ request()->routeIs('admin.kategori.*') ? 'bg-white/10 text-yellow-400' : 'hover:bg-white/10 hover:text-yellow-400' }}">
                        <i class="bi bi-folder"></i> Kategori
                    </a>
                    <a href="{{ route('admin.galeri.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                        {{ request()->routeIs('admin.galeri.*') ? 'bg-white/10 text-yellow-400' : 'hover:bg-white/10 hover:text-yellow-400' }}">
                        <i class="bi bi-images"></i> Galeri
                    </a>
                    <a href="{{ route('admin.posts.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                        {{ request()->routeIs('admin.posts.*') ? 'bg-white/10 text-yellow-400' : 'hover:bg-white/10 hover:text-yellow-400' }}">
                        <i class="bi bi-file-text"></i> Postingan
                    </a>
                    <a href="{{ route('admin.profile.index') }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                        {{ request()->routeIs('admin.profile.*') ? 'bg-white/10 text-yellow-400' : 'hover:bg-white/10 hover:text-yellow-400' }}">
                        <i class="bi bi-building"></i> Profil Sekolah
                    </a>
                </nav>
            </div>

            {{-- Footer / Logout --}}
            <div class="p-4 border-t border-white/10">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white py-2 rounded-lg transition">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Content --}}
        <main class="flex-1 md:ml-8 p-6 transition-all duration-300">
            @yield('content')
        </main>

    </div>

</body>
</html>
