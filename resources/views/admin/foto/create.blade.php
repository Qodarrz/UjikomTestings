@extends('admin.adminlayout')

@section('title', 'Tambah Data')

@section('content')
<div class="page-header mb-3">
    <h2>Tambah @yield('title')</h2>
    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route($routePrefix . '.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($fields as $name => $type)
                <div class="mb-3">
                    <label for="{{ $name }}" class="form-label">{{ ucfirst($name) }}</label>
                    @if ($type == 'textarea')
                        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" rows="4"></textarea>
                    @elseif ($type == 'file')
                        <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control">
                    @else
                        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control">
                    @endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
