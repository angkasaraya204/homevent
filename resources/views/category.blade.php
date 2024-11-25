<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
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

    <!-- Hero Section -->
    <section class="category">
        <div class="container">
            <div class="title title-acara">Acara</div>
            <div class=" title title-category">Category</div>
            <div class="flex-container">
                @foreach ($acara as $acr)
                <div class="event-card" style="width: 587px;">
                    <div class="event-date">{{ $acr->tanggal }}</div>
                    <div class="event-title">{{ $acr->genre }} {{ $acr->nama }}</div>
                    <div class="event-time">{{ $acr->deskripsi }}</div>
                    <div class="event-location">{{ $acr->tempat }}</div>
                    <div class="checkbox">
                        <div class="checkbox-inner"></div>
                    </div>
                    <div class="radio">
                        <div class="radio-inner"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="image-container">
                @foreach ($kategori as $kat)
                <div class="image-card">
                    <img class="image" src="{{ asset('img/'. $kat->gambar) }}" alt="Rock">
                    <div class="image-title">{{ $kat->nama }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Inline JavaScript -->
    <script src="{{ asset('js/category.js') }}"></script>
</body>

</html>