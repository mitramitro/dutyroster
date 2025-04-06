@extends('layouts.blank') {{-- Gunakan layout minimal tanpa sidebar/navbar untuk tampilan full screen --}}

@section('title', 'On Duty Roster Display')
@push('add-plugins-css')
<style>
.onduty-container {
    position: relative;
    background: url("{{ asset('bg-duty-roster.png') }}") no-repeat center center;
    background-size: cover;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    overflow: hidden;
}

.container {
    position: relative;
    z-index: 2;
    width: 95%;
    max-height: 100vh;
    overflow: hidden;
    text-align: center;
    background: rgba(255, 255, 255, 0.6);
}

h1, h2, h3, p {
    font-size: clamp(12px, 1.5vw, 18px);
    margin: 2px 0;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
    margin-top: 8px;
}

.col-md-3 {
    flex: 1 1 28%;
    min-width: 200px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background: rgba(255, 255, 255, 0.8);
}

.manager-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    text-align: center;
    margin-bottom: 12px;
}

.manager-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px; /* Jarak antar elemen */
}

.manager-photo {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
}

.manager-icon {
    font-size: 80px;
}

.manager-info {
    background: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 6px;
    min-width: 250px;
}
</style>
@endpush

@section('content')
<div class="onduty-container">
<div class="container py-2">
    <h1 style="font-weight: bold;">ON DUTY ROSTER</h1>
    <p style="font-size: 14px;">{{ \Carbon\Carbon::parse($onduty->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

   <div class="manager-container">
    <div class="manager-content">
        @if($onduty->managerOnDuty->photo)
            <img src="{{ asset('storage/' . $onduty->managerOnDuty->photo) }}" 
                 alt="{{ $onduty->managerOnDuty->nama }}" 
                 class="manager-photo">
        @else
            <i class="fas fa-user manager-icon"></i>
        @endif

        <div class="manager-info">
            <h3 class="text-danger">MANAGER ON DUTY</h3>
            <h4>{{ $onduty->managerOnDuty->nama }}</h4>
            <p>{{ $onduty->managerOnDuty->nohp }}</p>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-3">
            <h3 class="text-danger">HSSE</h3>
            <h4>{{ $onduty->hsse->nama }}</h4>
            <p>{{ $onduty->hsse->nohp }}</p>
        </div>
        <div class="col-md-3">
            <h3 class="text-danger">MPS</h3>
            <h4>{{ $onduty->mps->nama }}</h4>
            <p>{{ $onduty->mps->nohp }}</p>
        </div>
        <div class="col-md-3">
            <h3 class="text-danger">SSGA/QQ</h3>
            <h4>{{ $onduty->ssgaQq->nama }}</h4>
            <p>{{ $onduty->ssgaQq->nohp }}</p>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-3">
            <h3 class="text-danger">RSD FUEL</h3>
            <h4>{{ $onduty->rsdFuelPagi->nama }} (P)</h4>
            <!--<p>{{ $onduty->rsdFuelPagi->nohp }}</p>-->
            <h4>{{ $onduty->rsdFuelSore->nama }} (S)</h4>
            <!--<p>{{ $onduty->rsdFuelSore->nohp }}</p>-->
        </div>
        <div class="col-md-3">
            <h3 class="text-danger">RSD LPG</h3>
            <h4>{{ $onduty->rsdLpgPagi->nama }} (P)</h4>
            <!--<p>{{ $onduty->rsdLpgPagi->nohp }}</p>-->
            <h4>{{ $onduty->rsdLpgSore->nama }} (S)</h4>
            <!--<p>{{ $onduty->rsdLpgSore->nohp }}</p>-->
        </div>
    </div>
</div>
</div>
@endsection

@push('add-plugins-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script>
    // Pastikan $onduty ada, jika tidak maka set sebagai string kosong.
    let currentUpdatedAt = {!! json_encode(isset($onduty) && $onduty->updated_at ? $onduty->updated_at->format('Y-m-d H:i:s') : '') !!};
    
    // Ambil nilai office dari query string atau dari Auth, sesuai kebutuhan.
    let office = {!! json_encode(request('office', Auth::user()->office ?? '')) !!};

    // Fungsi polling AJAX dengan throttle untuk membatasi frekuensi request
    const fetchData = _.throttle(function() {
        console.log("Polling berjalan..."); // Cek apakah ini muncul di console
        
        $.ajax({
            url: "{{ route('onduty.latest') }}",
            type: "GET",
            data: { office: office },
            success: function(response) {
                console.log("Response dari server:", response); // Debug response dari server
                if (response.updated_at && response.updated_at !== currentUpdatedAt) {
                    window.location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error("Gagal mengambil data terbaru:", error);
            }
        });
    }, 5000); // Batasi request setiap 5 detik

    // Jalankan polling setiap 10 detik
    setInterval(fetchData, 10000);
</script>
@endpush
