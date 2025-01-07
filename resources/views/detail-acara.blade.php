<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    @include('partials.header')
    <div class="container py-4">
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>
</body>

</html>
