@extends('layouts.admin.master')
@section('title', 'Artikel')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artikel</a></div>
        </div>
    </div>

    <div class="section-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Data Artikel</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.artikel.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                    class="far fa-edit"></i> Tambah</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-md text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Tanggal</th>
                                <th>Penulis</th>
                                <th>Konten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $key => $art)
                            <tr>
                                <td>{{ $key + 1 + ($artikel->currentPage() - 1) * $artikel->perPage() }}</td>
                                <td>{{ $art->judul }}</td>
                                <td>{{ $art->kategori->nama }}</td>
                                <td>
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="{{ asset('img/' . $art->gambar) }}">
                                    </figure>
                                </td>
                                <td>{{ $art->tanggal }}</td>
                                <td>{{ $art->penulis }}</td>
                                <td>{!! Str::limit($art->konten, 50) !!}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="{{ route('admin.artikel.edit', $art->id) }}"
                                            class="btn btn-icon btn-primary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.artikel.hapus', $art->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                {{ $artikel->links('vendor.pagination.bootstrap-4') }}
                <!-- Menggunakan tampilan pagination yang telah dibuat -->
            </div>
        </div>
    </div>
</section>
@endsection
