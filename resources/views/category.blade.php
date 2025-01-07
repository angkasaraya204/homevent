<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    @include('partials.header')

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Category Section -->
            <div class="col-md-7 text-center">
                <h2 class="fw-bold text-dark mb-4">Category</h2>
                <div class="row g-3">
                    @foreach ($kategori as $kat)
                    <div class="col-md-6">
                        <a href="{{ route('artikel.kategori', $kat->nama) }}">
                                <img src="{{ asset('img/'. $kat->gambar) }}" class="rounded mx-auto d-block" alt="{{ $kat->nama }}" style="max-height: 8rem; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <p class="fw-bold mt-2 text-black">{{ $kat->nama }}</p>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Acara Section -->
            <div class="col-md-5">
                <h2 class="fw-bold text-dark mb-4">Acara</h2>
                @foreach ($acara as $acr)
                @if ($acr->status == 'approved')
                @php
                // Memeriksa apakah acara sudah di-bookmark oleh pengguna
                $isBookmarked = $acr->bookmarks()->where('user_id', Auth::id())->exists();
                @endphp
                <div class="card bg-primary text-white mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-calendar-alt"></i>  {{ \Carbon\Carbon::parse($acr->tanggal)->format('d F Y') }}</span>
                            @if (Auth::check() && Auth::user()->role === 'tamu')
                            <!-- Cek jika pengguna sudah login -->
                            <form action="{{ route('bookmark.tambah', ['acaraId' => $acr->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    @if ($isBookmarked)
                                    <i class="fa-regular fa-bookmark" aria-hidden="true" style="color: white;"></i>
                                    @else
                                    <i class="fa-solid fa-bookmark" aria-hidden="true" style="color: white;"></i>
                                    @endif
                            </form>
                            @endif
                        </div>
                        <a href="{{ route('acara.detail', $acr->slug) }}" style="text-decoration: none; color: white;">
                            <p class="mt-2">{{ $acr->kategori->nama }} {{ $acr->nama }}</p>
                        </a>
                        <div class="d-flex mt-2 justify-content-between">
                            <p>{{ Str::limit($acr->deskripsi, 10) }}</p>
                            <p>{{ Str::limit($acr->tempat, 20) }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
