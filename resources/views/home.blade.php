@extends('layouts.master')
@section('title','Halaman Utama')
@section('latest-event')
<h2>Latest Event</h2>
<div class="event-list">
    @foreach ($acara as $acr)
    <div class="event-item">
        <img src="{{ asset('img/'.$acr->gambar) }}">
        <div class="event-content">
            <h3>{{ $acr->genre }}</h3>
            <p class="event-meta">{{ $acr->tanggal }}</p>
            <p>{{ $acr->deskripsi }}</p>
            <a href="#">More...</a>
        </div>
    </div>
    @endforeach
</div>
@endsection