<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    @include('partials.header')

    <!-- About Us Section -->
    <div class="container my-5">
        <h1 class="text-primary fw-bold text-center mb-3">Home Event</h1>
        <h4 class="text-primary fw-bold mb-3">About Us</h4>
        <p class="text-muted">
            {{ $tentang->deskripsi }}
        </p>
    </div>

    <!-- Logo Section -->
    <div class="text-center my-5">
        <h3 class="text-primary fw-bold">Our Logo</h3>
        <img src="{{ asset('img/'. $tentang->logo) }}" alt="Logo" class="img-fluid rounded my-3" style="max-height: 8rem; object-fit: cover;">
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>