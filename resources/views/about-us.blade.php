<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Header with Centered Navigation -->
    <header class="header">
        @include('partials.navbar')
    </header>

    <section class="aboutus">
        <div class="home-event">Home Event</div>
        <div class="about-us">About Us</div>
        <div class="our-logo">Our Logo</div>
        <div class="home-event-description">
            {{ $tentang->deskripsi }}
        </div>
        <img class="image" src="{{ asset('img/'. $tentang->logo) }}" alt="Placeholder Image" />
    </section>

</body>

</html>