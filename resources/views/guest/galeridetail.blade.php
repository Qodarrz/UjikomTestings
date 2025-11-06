@extends('guest.layouts.app')

@section('title', $post->judul ?? 'Detail Galeri')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">

    {{-- ======== GALERI SLIDER ======== --}}
    <div class="md:col-span-2 relative group">
        <div class="relative w-full h-[550px] rounded-2xl overflow-hidden shadow-lg">
            <div id="slider" class="w-full h-full relative">
                @foreach($post->galery as $galeri)
                    @foreach($galeri->foto as $foto)
                        <img src="{{ asset('storage/' . $foto->file) }}" 
                            class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-700 ease-in-out rounded-2xl"
                            alt="{{ $foto->judul ?? 'Foto Album' }}">
                    @endforeach
                @endforeach
            </div>

            {{-- Tombol navigasi --}}
            <button id="prev" class="hidden group-hover:flex absolute top-1/2 left-3 -translate-y-1/2 bg-black/40 text-white rounded-full p-3 backdrop-blur-sm hover:bg-black/60 transition">
                &#10094;
            </button>
            <button id="next" class="hidden group-hover:flex absolute top-1/2 right-3 -translate-y-1/2 bg-black/40 text-white rounded-full p-3 backdrop-blur-sm hover:bg-black/60 transition">
                &#10095;
            </button>
        </div>

        {{-- Judul & deskripsi --}}
        <div class="mt-5">
            <h1 class="text-2xl font-semibold">{{ $post->judul }}</h1>
            <p class="text-gray-600 mt-2">{{ $post->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
        </div>
    </div>

    {{-- ======== SIDEBAR: LIKE & KOMENTAR ======== --}}
    <div class="md:col-span-1 flex flex-col gap-5">
        
        {{-- Tombol Like --}}
        @auth
        <button id="like-btn" 
            data-id="{{ $post->id }}" 
            class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-pink-500 to-red-500 text-white rounded-full shadow hover:scale-105 transition-transform">
            ❤️ <span id="like-count">{{ $post->likes->count() }}</span>
        </button>
        @else
            <p class="text-gray-600">
                Silakan <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> untuk menyukai.
            </p>
        @endauth

        {{-- Komentar --}}
        <div class="flex-1 overflow-y-auto max-h-[500px] p-4 border rounded-2xl shadow-sm bg-white/70 backdrop-blur-sm">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Komentar</h2>

            @forelse($post->comments as $comment)
                <div class="mb-4 border-b pb-2">
                    <p class="font-semibold text-gray-800">{{ $comment->user->name ?? 'Guest' }}</p>
                    <p class="text-gray-700">{{ $comment->isi }}</p>
                </div>
            @empty
                <p class="text-gray-500 text-sm">Belum ada komentar. Jadilah yang pertama!</p>
            @endforelse
        </div>

        {{-- Form komentar --}}
        @auth
        <form action="{{ route('guest.galeri.comment', $post->id) }}" method="POST" class="mt-2 bg-white rounded-2xl shadow-sm p-4">
            @csrf
            <textarea name="isi" rows="2" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Tulis komentar..."></textarea>
            <button type="submit" class="mt-3 w-full bg-blue-600 text-white py-2 rounded-full hover:bg-blue-700 transition">Kirim</button>
        </form>
        @else
            <p class="mt-3 text-center text-gray-600">
                Silakan <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> untuk berkomentar.
            </p>
        @endauth
    </div>
</div>

{{-- ======== SLIDER SCRIPT ======== --}}
<script>
    const images = document.querySelectorAll('#slider img');
    let current = 0;
    const intervalTime = 4000; // 4 detik
    let slideInterval;

    function showSlide(index) {
        images.forEach(img => img.classList.remove('opacity-100'));
        images[index].classList.add('opacity-100');
    }

    function nextSlide() {
        current = (current + 1) % images.length;
        showSlide(current);
    }

    function prevSlide() {
        current = (current - 1 + images.length) % images.length;
        showSlide(current);
    }

    // Inisialisasi
    if (images.length > 0) {
        images[current].classList.add('opacity-100');
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    // Tombol kontrol
    document.getElementById('next').addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });

    document.getElementById('prev').addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    // ======== LIKE BUTTON AJAX ========
    const likeBtn = document.getElementById('like-btn');
    if (likeBtn) {
        likeBtn.addEventListener('click', async () => {
            const postId = likeBtn.dataset.id;
            const url = `/galeri/${postId}/like`;
            const likeCount = document.getElementById('like-count');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                });

                const data = await response.json();
                let count = parseInt(likeCount.textContent);

                if (data.status === 'liked') {
                    likeCount.textContent = count + 1;
                    likeBtn.classList.add('scale-110');
                    setTimeout(() => likeBtn.classList.remove('scale-110'), 200);
                } else if (data.status === 'unliked') {
                    likeCount.textContent = count - 1;
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    }
</script>
@endsection
