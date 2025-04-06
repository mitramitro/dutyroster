@extends('layouts.main')

@section('title', 'Tambah Location')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tambah Location</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Locations</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Tambah</a></li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_lokasi">Nama Location</label>
                    <input type="text" name="nama_lokasi" class="form-control" placeholder="Masukkan nama location" required>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('locations.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
