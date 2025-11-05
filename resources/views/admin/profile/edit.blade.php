@extends('admin.adminlayout')

@section('title', 'Edit Data')

@section('content')
<div class="page-header mb-3">
    <h2>Edit @yield('title')</h2>
    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route($routePrefix . '.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($fields as $name => $type)
                <div class="mb-3">
                    <label for="{{ $name }}" class="form-label">{{ ucfirst($name) }}</label>
                    @if ($type == 'textarea')
                        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" rows="4">{{ $item->$name }}</textarea>
                    @elseif ($type == 'file')
                        <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control">
                        @if($item->$name)
                            <small class="text-muted">File saat ini: {{ $item->$name }}</small>
                        @endif
                    @else
                        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ $item->$name }}">
                    @endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
            </button>
        </form>
    </div>
</div>
@endsection
