@extends('layouts.admin.master')
@section('title', 'Bookmark')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bookmark</a></div>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Acara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookmarks as $key => $book)
                            <tr>
                                <td>{{ $key + 1 + ($bookmarks->currentPage() - 1) * $bookmarks->perPage() }}</td>
                                <td>{{ $book->user->name }}</td>
                                <td>{{ $book->acara->nama }}</td>
                                <td>
                                    <div class="buttons">
                                        <form action="{{ route('tamu.bookmark.hapus', $book->id) }}" method="POST"
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
                {{ $bookmarks->links('vendor.pagination.bootstrap-4') }}
                <!-- Menggunakan tampilan pagination yang telah dibuat -->
            </div>
        </div>
    </div>
</section>
@endsection