@extends('layouts.master2')
@section('title','Detail Acara')
@section('content')
<div class="container py-4 my-5">
    <h1 class="text-center mb-4">{{ $acara->kategori->nama }} {{ $acara->nama }}</h1>

    <div class="card" style="border: none;">
        <div class="card-body">
            <h4 class="card-text"><b>{{ $acara->kategori->nama }} {{ $acara->nama }}</b> {{ $acara->deskripsi }}</h4>
        </div>
        <img src="{{ asset('img/'. $acara->gambar) }}" class="card-img-bottom" alt="{{ $acara->kategori->nama }} {{ $acara->nama }}" height="350">
    </div>
    <div class="d-flex justify-content-between mt-4">
        <a href="javascript:history.back()" class="text-decoration-none">
            <h5>Back</h5>
        </a>
        <a href="{{ $acara->link }}" class="btn btn-primary">
            <h5>Buy Now</h5>
        </a>
    </div>
</div>
@endsection
