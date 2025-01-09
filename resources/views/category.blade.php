@extends('layouts.master2')
@section('title','Kategori')
@section('content')
<!-- Content -->
<div class="container my-5">
    <div class="row">
        <!-- Category Section -->
        <div class="col-md-7 text-center">
            <h2 class="fw-bold text-dark mb-4">Category</h2>
            <div class="row g-3">
                @foreach ($kategori as $kat)
                <div class="col-md-6">
                    <a href="{{ route('artikel.kategori', $kat->nama) }}" class="text-decoration-none">
                        <div class="card" style="border: none;">
                            <img src="{{ asset('img/'. $kat->gambar) }}" class="card-img-top" alt="{{ $kat->nama }}" width="100%" height="225">
                            <div class="card-body">
                                <h5 class="card-title">{{ $kat->nama }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Acara Section -->
        <div class="col-md-5">
            <h2 class="fw-bold text-dark mb-4">Acara</h2>
            @foreach ($acara as $acr)
            @if ($acr->status == 'approved')
            @php
            // Memeriksa apakah acara sudah di-bookmark oleh pengguna
            $isBookmarked = $acr->bookmarks()->where('user_id', Auth::id())->exists();
            @endphp
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span><i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($acr->tanggal)->format('d F Y') }}</span>
                        @if (Auth::check() && Auth::user()->role === 'tamu')
                        <!-- Cek jika pengguna sudah login -->
                        <form action="{{ route('bookmark.tambah', ['acaraId' => $acr->id]) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                @if ($isBookmarked)
                                <i class="fa-solid fa-bookmark" aria-hidden="true" style="color: white;"></i>
                                @else
                                <i class="fa-regular fa-bookmark" aria-hidden="true" style="color: white;"></i>
                                @endif
                        </form>
                        @endif
                    </div>
                    <a href="{{ route('acara.detail', $acr->slug) }}" style="text-decoration: none; color: white;">
                        <p class="mt-2">{{ $acr->kategori->nama }} {{ $acr->nama }}</p>
                    </a>
                    <div class="d-flex mt-2 justify-content-between">
                        <p>{{ Str::limit($acr->deskripsi, 10) }}</p>
                        <p>{{ Str::limit($acr->tempat, 20) }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
