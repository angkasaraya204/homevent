<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <style>
        #dynamic-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('partials.header')

    @yield('content')
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        const header = document.getElementById("dynamic-header");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 0) {
                header.classList.add("bg-white", "shadow-sm");
                header.classList.remove("bg-transparent");
            } else {
                header.classList.add("bg-transparent");
                header.classList.remove("bg-white", "shadow-sm");
            }
        });
    </script>
</body>

</html>