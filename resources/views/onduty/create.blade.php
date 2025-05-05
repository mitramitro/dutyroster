@extends('layouts.main')

@section('title', 'Tambah On Duty Roster')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tambah On Duty Roster</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">On Duty Roster</a>
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
            <form action="{{ route('onduty.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
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
                @php
                     // Gunakan optional() atau cek Auth::check()
                    $userOffice = Auth::check() ? Auth::user()->office : null;
                @endphp
                <div class="form-group">
                    <label for="manager_on_duty_id">Manager on Duty</label>
                    <select name="manager_on_duty_id" class="form-control" required>
                        <option value="">Pilih Manager</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'Manager' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hsse_pagi_id">HSSE Pagi</label>
                    <select name="hsse_pagi_id" class="form-control" required>
                        <option value="">Pilih HSSE Pagi</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'HSSE' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hsse_sore_id">HSSE Sore</label>
                    <select name="hsse_sore_id" class="form-control" required>
                        <option value="">Pilih HSSE Sore</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'HSSE' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="mps_id">MPS</label>
                    <select name="mps_id" class="form-control" required>
                        <option value="">Pilih MPS</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'MPS' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ssga_qq_id">SSGA/QQ</label>
                    <select name="ssga_qq_id" class="form-control" required>
                        <option value="">Pilih SSGA/QQ</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'SSGA/QQ' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rsd_fuel_pagi_id">RSD Fuel Pagi</label>
                    <select name="rsd_fuel_pagi_id" class="form-control" required>
                        <option value="">Pilih RSD Fuel Pagi</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'RSD' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rsd_fuel_sore_id">RSD Fuel Sore</label>
                    <select name="rsd_fuel_sore_id" class="form-control" required>
                        <option value="">Pilih RSD Fuel Sore</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'RSD' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rsd_lpg_pagi_id">RSD LPG Pagi</label>
                    <select name="rsd_lpg_pagi_id" class="form-control" required>
                        <option value="">Pilih RSD LPG Pagi</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'RSD' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rsd_lpg_sore_id">RSD LPG Sore</label>
                    <select name="rsd_lpg_sore_id" class="form-control" required>
                        <option value="">Pilih RSD LPG Sore</option>
                        @foreach($employees as $employee)
                            @if($employee->fungsi == 'RSD' && optional($employee->location)->nama_lokasi == $userOffice)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('onduty.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
