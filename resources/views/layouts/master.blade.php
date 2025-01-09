<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <!-- Heroes -->
    <div class="position-relative overflow-hidden text-center"
        style="background-image: url(https://s3-alpha-sig.figma.com/img/639a/a794/1074dad943891de91500f1c5e9040734?Expires=1737331200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZRZK7z~rcjIP1DRh5sfOQgNJx159MR8EKa9ddSBxvoEw9JkfpLZjDWk4qkrIKkR3DvSPrqnz0jreYAQDaHStTqMl5ea2~6tNZ~3kL0GhktfrC2gnQlDEF75R~QqTP36fvdPVhshMjZKnMa0I~JFSGCjaQtgtYT6bWIngKlsDQdm~50~NNPulctPnvF3GC~9jUVRvScaUppdglsm21qMcL6y1ricjmjjPd8xagtbIMYIArbznVFWed-o2q8jjVlcv2hRZykXRGfEAHn~xujoH0i7LOLr1bCfG8IffOWw553ovRQL2i5kt6licd~URgOc~L86mq5zdWoFSqFsC7KG4qw__); background-size: cover; background-position: center;">
        @include('partials.header')
        @include('partials.heroes')
    </div>

    @yield('content')

    <!-- Footer -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

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
