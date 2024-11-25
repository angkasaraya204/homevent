@extends('layouts.master')
@section('title','Halaman Utama')
@section('latest-event')
<h2>Latest Event</h2>
<div class="event-list">
    <div class="event-item">
        <img src="img/pop.jpeg" alt="Cosplay Event">
        <div class="event-content">
            <h3>Cosplay</h3>
            <p class="event-meta">Jakarta, 20 August 2024</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            <a href="#">More...</a>
        </div>
    </div>

    <div class="event-item">
        <img src="img/j-pop.jpg" alt="Jpop Event">
        <div class="event-content">
            <h3>Jpop</h3>
            <p class="event-meta">Jakarta, 15 August 2024</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            <a href="#">More...</a>
        </div>
    </div>

    <div class="event-item">
        <img src="img/k-pop.jpeg" alt="Kpop Event">
        <div class="event-content">
            <h3>Kpop</h3>
            <p class="event-meta">Jakarta, 09 August 2024</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            <a href="#">More...</a>
        </div>
    </div>
</div>
@endsection