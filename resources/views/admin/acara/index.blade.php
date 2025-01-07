@extends('layouts.admin.master')
@section('title', 'Acara')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Acara</a></div>
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
                <h4>Data Acara</h4>
            </div>
            <div class="card-body">
                @if(Auth::user()->role === 'tamu')
                <a href="{{ route('tamu.acara.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Tanggal</th>
                                <th>Genre</th>
                                <th>Link Kredensial</th>
                                <th>Tempat Acara</th>
                                <th>Deskripsi</th>
                                @if(Auth::user()->role === 'admin')
                                <th>Status</th>
                                @endif
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acara as $key => $acr)
                            <tr>
                                <td>{{ $key + 1 + ($acara->currentPage() - 1) * $acara->perPage() }}</td>
                                <td>{{ $acr->nama }}</td>
                                <td>
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="{{ asset('img/' . $acr->gambar) }}">
                                    </figure>
                                </td>
                                <td>{{ $acr->tanggal }}</td>
                                <td>{{ $acr->kategori->nama }}</td>
                                <td>{{ $acr->link }}</td>
                                <td>{{ $acr->tempat }}</td>
                                <td>{{ Str::limit($acr->deskripsi, 50) }}</td>
                                @if(Auth::user()->role === 'admin')
                                <td>{{ $acr->status }}</td>
                                @endif
                                @if(Auth::user()->role === 'tamu')
                                <td>
                                    <div class="buttons">
                                        <a href="{{ route('tamu.acara.edit', $acr->id) }}"
                                            class="btn btn-icon btn-primary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('tamu.acara.hapus', $acr->id) }}" method="POST"
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
                                @endif
                                @if(Auth::user()->role === 'admin')
                                <td>
                                    <form action="{{ route('status.approve', $acr->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-icon icon-left">
                                            <i class="fa fa-check"></i> Terima
                                        </button>
                                    </form>
                                    <form action="{{ route('status.reject', $acr->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-icon icon-left">
                                            <i class="fa fa-times"></i> Tolak
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                {{ $acara->links('vendor.pagination.bootstrap-4') }}
                <!-- Menggunakan tampilan pagination yang telah dibuat -->
            </div>
        </div>
    </div>
</section>
@endsection
