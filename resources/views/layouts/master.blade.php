<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #navbar {
            background-color: transparent; /* Transparan */
            transition: background-color 0.3s ease;
        }

        #navbar.scrolled {
            background-color: white; /* Warna putih saat di-scroll */
        }
        #navbar .nav-link {
            color: white; /* Warna teks putih saat di atas */
        }

        #navbar.scrolled .nav-link {
            color: black; /* Warna teks hitam saat di-scroll */
        }
        
        @media (max-width: 768px) {
            #navbar .navbar-nav {
                flex-direction: column; /* Mengatur item navbar menjadi kolom */
                align-items: center; /* Mengatur item navbar agar berada di tengah */
            }
            #navbar .nav-link {
                padding: 10px 15px; /* Menambahkan padding untuk item navbar */
                width: 100%; /* Membuat item navbar lebar penuh */
                text-align: center; /* Mengatur teks agar berada di tengah */
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        @include('partials.navbar')
    </nav>

    <!-- Header -->
    <header class="position-relative text-center text-white" style="height: 600px;">
        @include('partials.header')
    </header>

    @yield('content')

    <!-- Testimonial -->
    <section class="bg-dark text-white py-5">
        @include('partials.testimoni')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
