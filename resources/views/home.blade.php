@extends('layouts.master')
@section('title','Halaman Utama')
@section('content')
<!-- Our Event -->
<section class="container my-5 text-center">
    <h2 class="fw-bold mb-4">Our Event</h2>
    <div class="row">
        @foreach ($kategori as $item)
        <div class="col-md-4 mb-2 mt-2">
            <img src="{{ asset('img/'.$item->gambar) }}" alt="{{ $item->nama }}" class="rounded-start" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title mt-2">{{ $item->nama }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Latest Event -->
<section class="container-fluid bg-primary text-white p-5">
    <h2 class="fw-bold mb-4 text-center">Latest Event</h2>
        <div class="row justify-content-center">
            @foreach ($acara as $acr)
            <div class="card mb-3" style="max-width: 50rem;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('img/'.$acr->gambar) }}" alt="{{ $acr->genre }}" class="rounded-start" style="width: 16rem;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $acr->genre }}</h5>
                            <p class="card-text"><small class="text-muted">{{ $acr->tanggal }}</small></p>
                            <p class="card-text">{{ Str::limit($acr->deskripsi, 100) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection
