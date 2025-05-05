@extends('layouts.main') {{-- Gunakan layout minimal tanpa sidebar/navbar untuk tampilan full screen --}}

@section('title', 'On Duty Roster Display')

@section('content')
<div class="container text-center py-4" style="max-width: 900px; margin: auto;">
    <h2 class="mb-1" style="font-weight: bold;">ON DUTY ROSTER</h2>
    {{-- Format tanggal menggunakan Carbon --}}
    <p class="mb-4" style="font-size: 18px;">{{ \Carbon\Carbon::parse($onduty->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

    <!-- Manager On Duty -->
    <div style="margin-bottom: 20px;">
        @if($onduty->managerOnDuty->photo)
        <img src="{{ asset('storage/' . $onduty->managerOnDuty->photo) }}" alt="{{ $onduty->managerOnDuty->nama }}" style="width:120px; height:120px; border-radius:50%; object-fit:cover;">
    @else
        <i class="fas fa-user" style="font-size: 120px;"></i>
    @endif
    
        <h4 class="mt-3 text-danger" style="font-weight: bold;">MANAGER ON DUTY</h4>
        <h5 class="mb-0" style="font-weight: bold;">{{ $onduty->managerOnDuty->nama }}</h5>
        <p style="margin-bottom: 0;">{{ $onduty->managerOnDuty->nohp }}</p>
    </div>

    <!-- Baris Tim Bagian 1: HSSE, MPS, SSGA/QQ -->
    <div class="row justify-content-center" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <div class="col-md-3" style="border:1px solid #ccc; border-radius:8px; padding:10px; min-width:180px;">
            <h5 class="text-danger" style="font-weight: bold;">HSSE</h5>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->hssePagi->nama }}</p>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->hsseSore->nama }}</p>
            {{-- <p class="mb-1">{{ $onduty->hsse->nohp }}</p> --}}
        </div>

        <div class="col-md-3" style="border:1px solid #ccc; border-radius:8px; padding:10px; min-width:180px;">
            <h5 class="text-danger" style="font-weight: bold;">MPS</h5>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->mps->nama }}</p>
            <p class="mb-1">{{ $onduty->mps->nohp }}</p>
        </div>

        <div class="col-md-3" style="border:1px solid #ccc; border-radius:8px; padding:10px; min-width:180px;">
            <h5 class="text-danger" style="font-weight: bold;">SSGA/QQ</h5>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->ssgaQq->nama }}</p>
            <p class="mb-1">{{ $onduty->ssgaQq->nohp }}</p>
        </div>
    </div>

    <!-- Baris Tim Bagian 2: RSD Fuel dan RSD LPG -->
    <div class="row justify-content-center mt-4" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <div class="col-md-3" style="border:1px solid #ccc; border-radius:8px; padding:10px; min-width:180px;">
            <h5 class="text-danger" style="font-weight: bold;">RSD FUEL</h5>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->rsdFuelPagi->nama }}</p>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->rsdFuelSore->nama }}</p>
        </div>

        <div class="col-md-3" style="border:1px solid #ccc; border-radius:8px; padding:10px; min-width:180px;">
            <h5 class="text-danger" style="font-weight: bold;">RSD LPG</h5>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->rsdLpgPagi->nama }}</p>
            <p class="mb-0" style="font-weight: bold;">{{ $onduty->rsdLpgSore->nama }}</p>
        </div>
    </div>
</div>
@endsection
