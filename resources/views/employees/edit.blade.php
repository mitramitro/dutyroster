@extends('layouts.main')

@section('title', 'Edit Employee')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Data Pekerja</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $employee->nama) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $employee->jabatan) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fungsi">Fungsi</label>
            <select name="fungsi" class="form-control" required>
                <option value="">-- Pilih Fungsi --</option>
                <option value="Manager" {{ $employee->fungsi == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="HSSE" {{ $employee->fungsi == 'HSSE' ? 'selected' : '' }}>HSSE</option>
                <option value="MPS" {{ $employee->fungsi == 'MPS' ? 'selected' : '' }}>MPS</option>
                <option value="SSGA/QQ" {{ $employee->fungsi == 'SSGA/QQ' ? 'selected' : '' }}>SSGA/QQ</option>
                <option value="RSD Fuel Pagi" {{ $employee->fungsi == 'RSD Fuel Pagi' ? 'selected' : '' }}>RSD Fuel Pagi</option>
                <option value="RSD Fuel Sore" {{ $employee->fungsi == 'RSD Fuel Sore' ? 'selected' : '' }}>RSD Fuel Sore</option>
                <option value="RSD LPG Pagi" {{ $employee->fungsi == 'RSD LPG Pagi' ? 'selected' : '' }}>RSD LPG Pagi</option>
                <option value="RSD LPG Sore" {{ $employee->fungsi == 'RSD LPG Sore' ? 'selected' : '' }}>RSD LPG Sore</option>
            </select>
        </div>

        <div class="form-group">
            <label for="location_id">Lokasi</label>
            <input type="text" class="form-control" value="{{ $employee->location->nama_lokasi }}" readonly>
            <input type="hidden" name="location_id" value="{{ $employee->location_id }}">
        </div>
     
        

        <div class="form-group">
            <label for="nohp">No HP</label>
            <input type="text" name="nohp" value="{{ old('nohp', $employee->nohp) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto (biarkan kosong jika tidak diganti)</label>
            <input type="file" name="photo" class="form-control-file">
            @if ($employee->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $employee->photo) }}" width="150" alt="Foto Lama">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
