@extends('guest.layouts.app')

@section('title', $post->judul)

@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a href="{{ route('berita.index') }}" class="text-decoration-none text-secondary">
            ← Kembali ke daftar berita
        </a>
    </div>

    <article class="card shadow-sm border-0 p-4">
        <h1 class="fw-bold mb-2">{{ $post->judul }}</h1>
        <p class="text-muted mb-4">
            Kategori: {{ $post->kategori->judul ?? '-' }} |
            Diposting: {{ $post->created_at->translatedFormat('d F Y') }}
        </p>

        <div class="content">
            {!! $post->isi !!}
        </div>

        {{-- Bagian komentar sederhana --}}
        <hr class="my-5">

        <h5 class="fw-semibold mb-3">Komentar</h5>
        @if($post->comments->count())
            <div class="list-group mb-4">
                @foreach($post->comments as $comment)
                    <div class="list-group-item border-0 border-bottom">
                        <p class="mb-1 fw-semibold">{{ $comment->user->name ?? 'Anonim' }}</p>
                        <p class="mb-0">{{ $comment->isi }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">Belum ada komentar.</p>
        @endif

        {{-- Form komentar (jika nanti mau dibuat interaktif) --}}
        {{-- 
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>
        --}}
    </article>
</div>
@endsection
