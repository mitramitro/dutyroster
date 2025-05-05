@extends('layouts.main')

@section('title', 'Tambah Employee')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tambah Employee</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Employee</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah</a>
            </li>
        </ul>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan" required>
                </div>
                <div class="form-group">
                <label for="fungsi">Fungsi</label>
                <select name="fungsi" class="form-control" required>
                    <option value="">-- Pilih Fungsi --</option>
                    <option value="Manager">Manager</option>
                    <option value="HSSE">HSSE</option>
                    <option value="MPS">MPS</option>
                    <option value="SSGA/QQ">SSGA/QQ</option>
                    <option value="RSD">RSD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location_id">Lokasi</label>
                @if(Auth::check())
                @if(Auth::user()->role == 'admin')
                <select name="location_id" class="form-control" required>
                    <option value="">Pilih Lokasi</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->nama_lokasi }}</option>
                    @endforeach
                </select>
                @else
                <!-- Jika user non-admin, tampilkan lokasi readonly sesuai dengan office user -->
                @php
                    $userLocation = Auth::user()->office; // Ambil office dari user yang login
                    $loc = $locations->firstWhere('nama_lokasi', $userLocation);
                @endphp
                    <input type="text" class="form-control" value="{{ $userLocation }}" readonly>
                    <input type="hidden" name="location_id" value="{{ $loc ? $loc->id : '' }}">
                @endif
            @else
                <!-- Jika session habis, arahkan pengguna untuk login -->
                <div class="alert alert-warning">
                    Sesi Anda telah habis. Silakan <a href="{{ route('login') }}">login</a> kembali.
                </div>
            @endif
            <div class="form-group">
                <label for="nohp">No HP</label>
                <input type="text" name="nohp" class="form-control" placeholder="Masukkan No HP" required>
            </div>
                <div class="form-group">
                    <label for="photo">Foto (Opsional)</label>
                    <input type="file" name="photo" class="form-control-file">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
