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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=bookmark" />
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
            <div class="title title-category">Category</div>
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
                                        <span class="material-symbols-outlined" style="color: {{ $isBookmarked ? 'black' : 'white' }};">
                                            bookmark
                                        </span>
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
                @if($artikels->isEmpty())
                    <h1>Tidak ada artikel untuk kategori ini.</h1>
                @else
                    <ul>
                        @foreach($artikels as $artikel)
                            <li>
                                <img src="{{ asset('img/'. $artikel->gambar) }}" style="width: 50%;">
                                <p>Kategori: {{ $artikel->kategori->nama }}</p>
                                <a href="{{ route('artikel.detail', $artikel->id) }}">
                                    <h1>{{ $artikel->judul }}</h1>
                                </a>
                                <p>Deskripsi: {!! Str::limit($artikel->konten, 100) !!}</p>
                                <p>Penulis: {{ $artikel->penulis }}</p>
                                <p>Tanggal: {{ $artikel->tanggal }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>

    <!-- Inline JavaScript -->
    <script src="{{ asset('js/category.js') }}"></script>
</body>

</html>