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
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css">
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
                    @if ($acr->status == 'approved')
                        @php
                            // Memeriksa apakah acara sudah di-bookmark oleh pengguna
                            $isBookmarked = $acr->bookmarks()->where('user_id', Auth::id())->exists();
                        @endphp
                        <div class="event-card" style="width: 587px;">
                            <div class="event-date">{{ $acr->tanggal }}
                                @if (Auth::check() && Auth::user()->role === 'tamu') <!-- Cek jika pengguna sudah login -->
                                <form action="{{ route('bookmark.tambah', ['acaraId' => $acr->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                                        @if ($isBookmarked)
                                            <i class="fa-solid fa-bookmark" style="color: white; font-size: 150%;"></i> <!-- Ikon solid jika sudah dibookmark -->
                                        @else
                                            <i class="fa-regular fa-bookmark" style="color: white; font-size: 150%;"></i> <!-- Ikon regular jika belum dibookmark -->
                                        @endif
                                    </button>
                                </form>
                                @endif
                            </div>
                            <div class="event-title">{{ $acr->genre }} {{ $acr->nama }}</div>
                            <div class="event-time">{{ $acr->deskripsi }}
                            </div>
                            <div class="event-location">{{ $acr->tempat }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="image-container">
                @foreach ($kategori as $kat)
                <a href="{{ route('artikel.kategori', $kat->id) }}">
                    <div class="image-card">
                        <img class="image" src="{{ asset('img/'. $kat->gambar) }}" alt="Rock">
                            <div class="image-title">{{ $kat->nama }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Inline JavaScript -->
    <script src="{{ asset('js/category.js') }}"></script>
</body>

</html>