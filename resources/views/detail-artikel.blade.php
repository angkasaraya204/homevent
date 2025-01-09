@extends('layouts.master2')
@section('title','Detail Artikel')
@section('content')
    <!-- Content -->
    <div class="container py-4 my-5">
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
@endsection