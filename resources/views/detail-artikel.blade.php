<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    @include('partials.header')

    <!-- Content -->
    <div class="container py-4">
        <h1 class="fs-3 fw-bold">{{ $artikel->judul }}</h1>
        <p class="text-muted">
            Ditulis Oleh: <span class="fw-bold">{{ $artikel->penulis }}</span> – {{ $artikel->tanggal }}
            <span class="badge bg-primary">{{ $artikel->kategori->nama }}</span>
        </p>

        <!-- Image and Text Side-by-Side -->
        <div class="row g-4 align-items-start">
            <!-- Image Section -->
            <div class="col-md-4">
                <img src="{{ asset('img/'. $artikel->gambar) }}" class="rounded mx-auto d-block" style="width: 8rem;" alt="{{ $artikel->judul }}">
            </div>
            <!-- Text Section -->
            <div class="col-md-8">
                <p>{!! $artikel->konten !!}</p>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="mt-4">
            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function () {
                    this.page.url = "{{ url()->current() }}";  // URL dinamis halaman detail artikel
                    this.page.identifier = "{{ $artikel->id }}"; // Identifier unik artikel (bisa slug atau ID)
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://' + "{{ env('DISQUS_SHORTNAME') }}" + '.disqus.com/embed.js'; // Ganti 'home-event' dengan shortname Anda
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
        <a href="{{ route('category') }}" class="text-primary text-decoration-none d-block text-end mt-4">Back</a>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>
</body>

</html>
