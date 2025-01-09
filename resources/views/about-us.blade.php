@extends('layouts.master2')
@section('title','Tentang Kami')
@section('content')
<!-- About Us Section -->
<div class="container my-5">
    <h1 class="text-primary fw-bold text-center mb-3">Home Event</h1>
    <h4 class="text-primary fw-bold mb-3">About Us</h4>
    <p class="text-muted">
        {{ $tentang->deskripsi }}
    </p>
</div>

<!-- Logo Section -->
<div class="text-center my-5">
    <h3 class="text-primary fw-bold">Our Logo</h3>
    <img src="{{ asset('img/'. $tentang->logo) }}" alt="Logo" class="img-fluid rounded my-3" style="max-height: 8rem; object-fit: cover;">
</div>
@endsection