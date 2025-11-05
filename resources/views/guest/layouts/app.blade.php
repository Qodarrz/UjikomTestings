<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 4 Bogor')</title>

    {{-- ✅ Import TailwindCSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans leading-relaxed text-gray-800">

    {{-- ✅ Header terpisah --}}
    @include('guest.layouts.header')

    {{-- Main Content --}}
    <main class="mt-17">
        @yield('content')
    </main>

    {{-- ✅ Footer --}}
    @include('guest.layouts.footer')

    {{-- Script kecil buat animasi & efek scroll --}}
    <script>
        // Navbar shrink effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('py-2', 'shadow-xl');
                navbar.classList.remove('py-4');
            } else {
                navbar.classList.remove('py-2', 'shadow-xl');
                navbar.classList.add('py-4');
            }
        });

        // Fade-up animasi ketika elemen muncul
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.1 });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.fade-up').forEach(el => {
                el.classList.add('opacity-0', 'translate-y-4', 'transition', 'duration-700');
                observer.observe(el);
            });
        });
    </script>

</body>
</html>
