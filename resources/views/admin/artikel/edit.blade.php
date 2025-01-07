@extends('layouts.admin.master')
@section('title', 'Edit Artikel')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artikel</a></div>
            <div class="breadcrumb-item"><a href="#">Edit</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Artikel</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="judul">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukan Judul" value="{{ $artikel->judul }}">
                            </div>
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="slug">Slug</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="contoh tutorial-masak" value="{{ $artikel->slug }}">
                            </div>
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="kategori">Kategori</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                    <option>Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $artikel->kategori_id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="gambar">Gambar</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            </div>
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tanggal">Tanggal</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $artikel->tanggal }}">
                            </div>
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="penulis">Penulis</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" placeholder="Masukan Judul" value="{{ $artikel->penulis }}">
                            </div>
                            @error('penulis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="konten">Konten</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple @error('konten') is-invalid @enderror" name="konten">{{ $artikel->konten }}</textarea>
                            </div>
                            @error('konten')
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
