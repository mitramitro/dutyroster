@extends('layouts.main')

@section('title', 'Tambah User')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tambah User</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">User</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Tambah</a></li>
        </ul>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>
                <!-- Office Dropdown (dari $locations) -->
                <div class="form-group">
                    <label for="office">Office</label>
                    <select name="office" class="form-control" required>
                        <option value="">-- Pilih Office --</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->nama_lokasi }}">{{ $location->nama_lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Position Dropdown (dari $positions) -->
                {{-- <div class="form-group">
                    <label for="position">Position</label>
                    <select name="position" class="form-control" required>
                        <option value="">-- Pilih Position --</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->jabatan }}">{{ $position->jabatan }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <!-- No HP -->
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" name="nohp" class="form-control" placeholder="Masukkan nomor HP" required>
                </div>
                <!-- Role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <!-- Tombol Simpan & Batal -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
