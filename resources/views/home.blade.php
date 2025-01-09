@extends('layouts.master')
@section('title','Halaman Utama')
@section('content')
<!-- Our Event -->
<div class="position-relative overflow-hidden text-center">
    <div class="col-md-5 p-lg-3 mx-auto">
        <h1 class="display-6 fw-normal">Our Event</h1>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($kategori as $item)
            <div class="col" data-bs-toggle="modal" data-bs-target="#deskripsi-{{ $item->id }}">
                <div class="card" style="border: none;">
                    <img src="{{ asset('img/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" width="100%" height="225">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="deskripsi-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            @if(empty($item->deskripsi))
                            Tidak ada detail untuk kategori ini.
                            @else
                            {!! $item->deskripsi !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Latest Event -->
<div class="position-relative overflow-hidden bg-primary mt-5">
    <div class="col-md-5 p-lg-3 mx-auto text-light">
        <h1 class="display-6 fw-normal text-center">Latest Event</h1>
    </div>
    <div class="container">
        @forelse ($acara as $acr)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/'.$acr->gambar) }}" class="img-fluid rounded-start" alt="{{ $acr->genre }}" style="width: 100%; height: 225px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $acr->kategori->nama }}</h5>
                        <p class="card-text"><small class="text-body-secondary">{{ \Carbon\Carbon::parse($acr->tanggal)->format('d F Y') }}</small>
                            <p class="card-text">{{ Str::limit($acr->deskripsi, 400) }}</p>
                            <a href="{{ route('acara.detail', $acr->slug) }}">
                                <p class="card-text">Selengkapnya..</small></p>
                            </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <p class="text-center text-light">Tidak ada acara yang anda cari.</p>
        @endforelse
    </div>
</div>
@endsection