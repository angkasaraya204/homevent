@extends('layouts.master2')
@section('title','Per-Kategori')
@section('content')
    <!-- Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Category Section -->
            <div class="col-md-7">
                <h2 class="fw-bold text-dark mb-4 text-center">Category</h2>
                @if($artikels->isEmpty())
                <h3>Tidak ada artikel untuk kategori ini.</h3>
                @else
                @foreach($artikels as $artikel)
                <div class="card mb-4" style="border: none;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/'. $artikel->gambar) }}" class="rounded mx-auto d-block" style="width: 8rem;" alt="{{ $artikel->kategori->nama }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $artikel->kategori->nama }}</h5>
                                <a href="{{ route('artikel.detail', ['nama' => $artikel->kategori->nama, 'slug' => $artikel->slug]) }}" style="text-decoration: none; color:black;">
                                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                                </a>
                                <p class="card-text">{!! Str::limit($artikel->konten, 100) !!}</p>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text">{{ $artikel->penulis }}</p>
                                    <p class="card-text">{{ $artikel->tanggal }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
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
                            <span><i class="fas fa-calendar-alt"></i>  {{ \Carbon\Carbon::parse($acr->tanggal)->format('d F Y') }}</span>
                            @if (Auth::check() && Auth::user()->role === 'tamu')
                            <!-- Cek jika pengguna sudah login -->
                            <form action="{{ route('bookmark.tambah', ['acaraId' => $acr->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    @if ($isBookmarked)
                                    <i class="fa-regular fa-bookmark" aria-hidden="true" style="color: white;"></i>
                                    @else
                                    <i class="fa-solid fa-bookmark" aria-hidden="true" style="color: white;"></i>
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
