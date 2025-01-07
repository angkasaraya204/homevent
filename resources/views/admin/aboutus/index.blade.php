@extends('layouts.admin.master')
@section('title', 'Tentang Kami')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tentang Kami</a></div>
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
                <h4>Data Tentang Kami</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tentang as $key => $tnt)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="{{ asset('img/' . $tnt->logo) }}">
                                    </figure>
                                </td>
                                <td>{{ $tnt->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('admin.editabout', $tnt->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
