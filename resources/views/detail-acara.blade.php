@extends('layouts.master2')
@section('title','Detail Acara')
@section('content')
    <div class="container py-4 my-5">
        <h1 class="text-center mb-4">{{ $acara->kategori->nama }} {{ $acara->nama }}</h1>

        <p style="font-size: 2rem;"><b>{{ $acara->kategori->nama }} {{ $acara->nama }}</b> {{ $acara->deskripsi }}</p>

        <div class="mb-4">
            <img src="{{ asset('img/'. $acara->gambar) }}" class="rounded mx-auto d-block" style="width: 12rem;" alt="{{ $acara->kategori->nama }} {{ $acara->nama }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="javascript:history.back()" class="text-decoration-none">
                <h5>Back</h5>
            </a>
            <a href="{{ $acara->link }}" class="btn btn-primary">
                <h5>Buy Now</h5>
            </a>
        </div>
    </div>
@endsection
