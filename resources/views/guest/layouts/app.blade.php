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
    
    {{-- Alpine JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50 font-sans leading-relaxed text-gray-800">

    {{-- ✅ Header terpisah --}}
    @include('guest.layouts.header')

    {{-- Main Content --}}
    <main class="">
        @yield('content')
    </main>

    {{-- ✅ Footer --}}
    @include('guest.layouts.footer')


</body>
</html>