@extends('layouts.admin.master')
@section('title', 'Edit Kategori')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori</a></div>
            <div class="breadcrumb-item"><a href="#">Edit</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Kategori</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.kategori.update', $kategori->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama" value="{{ $kategori->nama }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ $kategori->gambar }}">
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection