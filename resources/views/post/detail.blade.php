@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="post-wrapper mb-5">
        <div class="judul mb-3">
            <h2>{{ $data->judul }}</h2>
            <p>Penulis : <span class="fw-semibold">{{ $data->penulis }}</span></p>
        </div>
        <div class="tgl">
            <span>Tanggal dibuat : {{ $data->tgl_dibuat }}</span>
        </div>
        <div class="tgl mb-4">
            <span>Kategori : {{ $data->kategori->nama_kategori }}</span>
        </div>
        <div class="isi">
            <p class="fs-5">{{ $data->isi }}</p>
        </div>
    </div>
</div>
@endsection
