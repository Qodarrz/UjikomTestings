@extends('guest.layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold">Berita Terbaru</h1>

    @if($berita->count())
        <div class="row g-4">
            @foreach($berita as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $item->judul }}</h5>
                            <p class="text-muted small mb-2">
                                Kategori: {{ $item->kategori->judul ?? '-' }} |
                                {{ $item->created_at->format('d M Y') }}
                            </p>
                            <p class="card-text flex-grow-1">
                                {{ Str::limit(strip_tags($item->isi), 120, '...') }}
                            </p>
                            <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-primary mt-3 w-100">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <h5 class="text-muted">Belum ada berita yang tersedia.</h5>
        </div>
    @endif
</div>
@endsection
