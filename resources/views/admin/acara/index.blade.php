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
                <div class="buttons">
                    <a href="{{ route('admin.acara.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah</a>
                    <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Ekspor</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Genre</th>
                                <th>Link Kredensial</th>
                                <th>Tempat Acara</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acara as $key => $acr)
                            <tr>
                                <td>{{ $key + 1 + ($acara->currentPage() - 1) * $acara->perPage() }}</td>
                                <td>{{ $acr->nama }}</td>
                                <td>{{ $acr->tanggal }}</td>
                                <td>{{ $acr->genre }}</td>
                                <td>{{ $acr->link }}</td>
                                <td>{{ $acr->tempat }}</td>
                                <td>{{ $acr->deskripsi }}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="{{ route('admin.acara.edit', $acr->id) }}"
                                            class="btn btn-icon btn-primary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.acara.hapus', $acr->id) }}" method="POST"
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
                {{ $acara->links('vendor.pagination.bootstrap-4') }}
                <!-- Menggunakan tampilan pagination yang telah dibuat -->
            </div>
        </div>
    </div>
</section>
@endsection
