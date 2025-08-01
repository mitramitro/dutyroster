@extends('layouts.main')

@section('title', 'Edit On Duty Roster')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit On Duty Roster</h4>
        <ul class="breadcrumbs">
            <li class="nav-home"><a href="#"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">On Duty Roster</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Edit</a></li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('onduty.update', $onDutyRoster->id) }}" method="POST">
                @csrf
                @method('PUT')

           

                @php
                    use Carbon\Carbon;
                    $userLocation = Auth::check() ? Auth::user()->office : null;
                    $loc = $locations->firstWhere('nama_lokasi', $userLocation);
                @endphp

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal',\Carbon\Carbon::parse($onDutyRoster->tanggal)->format('Y-m-d')) }}" required>
                </div>
             
                <div class="form-group">
                    <label for="location_id">Lokasi</label>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                        <select name="location_id" class="form-control" required>
                            <option value="">Pilih Lokasi</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" {{ $onDutyRoster->location_id == $location->id ? 'selected' : '' }}>
                                    {{ $location->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" class="form-control" value="{{ $userLocation }}" readonly>
                        <input type="hidden" name="location_id" value="{{ $loc ? $loc->id : '' }}">
                    @endif
                </div>

                @php
                $roles = [
                    'manager_on_duty_id' => ['label' => 'Manager', 'fungsi' => 'Manager'],
                    'hsse_pagi_id' => ['label' => 'HSSE PAGI', 'fungsi' => 'HSSE'],
                    // 'hsse_sore_id' => ['label' => 'HSSE SORE', 'fungsi' => 'HSSE'],
                    'mps_id' => ['label' => 'MPS', 'fungsi' => 'MPS'],
                    'ssga_qq_id' => ['label' => 'SSGA/QQ', 'fungsi' => 'SSGA/QQ'],
                    'rsd_fuel_pagi_id' => ['label' => 'RSD Fuel Pagi', 'fungsi' => 'RSD'],
                    'rsd_fuel_sore_id' => ['label' => 'RSD Fuel Sore', 'fungsi' => 'RSD'],
                    'rsd_lpg_pagi_id' => ['label' => 'RSD LPG Pagi', 'fungsi' => 'RSD'],
                    'rsd_lpg_sore_id' => ['label' => 'RSD LPG Sore', 'fungsi' => 'RSD'],
                ];
                @endphp


                @foreach($roles as $field => $info)
                    <div class="form-group">
                        <label for="{{ $field }}">{{ $info['label'] }}</label>
                        <select name="{{ $field }}" class="form-control" required>
                            <option value="">Pilih {{ $info['label'] }}</option>
                            @foreach($employees as $employee)
                                @if($employee->fungsi == $info['fungsi'] && optional($employee->location)->nama_lokasi == $userLocation)
                                    <option value="{{ $employee->id }}" {{ $onDutyRoster->$field == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endforeach

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('onduty.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
