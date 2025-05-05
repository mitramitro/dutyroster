@extends('layouts.main')

@section('title', 'On Duty Roster')

@push('add-plugins-css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        .isDisabled {
            cursor: not-allowed;
            opacity: 0.5;
            pointer-events: none;
        }
        .isDisabled > a {
            color: currentColor;
            display: inline-block;
            pointer-events: none;
            text-decoration: none;
        }
        tr.published-row td {
    background-color: #d4edda !important;
}

    </style>
@endpush

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">ON DUTY ROSTER</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Tables</a></li>
        </ul>
    </div>

    @if(session()->has('success'))
       <div class="alert alert-success">
         {{ session('success') }}
       </div>
    @endif

    <div class="row">
        <div class="col-md-12">
           <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Daftar On Duty Roster</h4>
                        <div class="ml-auto">
                            <a href="{{ route('onduty.create') }}" class="btn btn-primary btn-round">
                                <i class="fa fa-plus"></i> Tambah On Duty
                            </a>
                            @if(Auth::check())
                                <a href="{{ route('onduty.publish', ['office' => Auth::user()->office]) }}" target="_blank" class="btn btn-success btn-round">
                                    <i class="fas fa-plane"></i> Publish
                                </a>
                            @else
                                    <a href="{{ route('login') }}" class="btn btn-success btn-round">
                                        <i class="fas fa-plane"></i> Login untuk Publish
                                    </a>
                             @endif
                        </div>
                    </div>
                </div>
              <div class="card-body">
                 <div class="table-responsive">
                    <table id="onduty-table" class="display table table-striped table-hover" style="width:100%;">
                       <thead>
                          <tr>
                             <th>Aksi</th>
                             <th>Tanggal</th>
                             <th>Lokasi</th>
                             <th>Manager on Duty</th>
                             <th>HSSE Pagi</th>
                             <th>HSSE Sore</th>
                             <th>MPS</th>
                             <th>SSGA/QQ</th>
                             <th>RSD Fuel Pagi</th>
                             <th>RSD Fuel Sore</th>
                             <th>RSD LPG Pagi</th>
                             <th>RSD LPG Sore</th>
                          </tr>
                       </thead>
                       <tbody></tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection

@push('add-plugins-js')
    <!-- jQuery & DataTables JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = $('#onduty-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('onduty.index') }}",
        dataSrc: function(response) {
        console.log("Server Response:", response); // Cek apakah is_published ada
        return response.data;
    },
        error: function(xhr, error, code) {
            if (xhr.status === 401) {
                swal('Sesi habis', 'Silakan login kembali.', 'warning')
                    .then(() => window.location.href = "{{ route('pageLogin') }}");
            } else {
                swal('Error', 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            }
        }
    },
    columns: [
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                let toggleIcon = row.is_published ? "fa-toggle-on text-success" : "fa-toggle-off text-secondary";
                let toggleTitle = row.is_published ? "no" : "published";

                return `
                    <a href="/onduty/${row.id}/edit" class="btn btn-link text-warning" title="Edit">
                    <i class="fas fa-edit"></i> 
                    </a> 
                    <a href="javascript:void(0);" onclick="delConfirm(${row.id})" class="btn btn-link text-danger" title="Hapus">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="togglePublish(${row.id}, ${row.is_published})" class="btn btn-link" title="${toggleTitle}">
                        <i class="fas ${toggleIcon}"></i>
                    </a>
                     <!--
                    <a href="{{ route('onduty.preview', '') }}/${row.id}"
                    class="btn btn-link text-success"
                    title="Preview"
                    >
                        <i class="fas fa-eye"></i>
                    </a> -->
                `;
            }
        },
        { data: 'tanggal', name: 'tanggal' },
        { data: 'lokasi', name: 'lokasi' },
        { data: 'manager_on_duty', name: 'managerOnDuty' },
        { data: 'hsse_pagi', name: 'hssePagi' },
        { data: 'hsse_sore', name: 'hsseSore' },
        { data: 'mps', name: 'mps' },
        { data: 'ssga_qq', name: 'ssgaQq' },
        { data: 'rsd_fuel_pagi', name: 'rsdFuelPagi' },
        { data: 'rsd_fuel_sore', name: 'rsdFuelSore' },
        { data: 'rsd_lpg_pagi', name: 'rsdLpgPagi' },
        { data: 'rsd_lpg_sore', name: 'rsdLpgSore' }
    ],
    rowCallback: function(row, data) {
    console.log("Publish value:", data.publish); // Debugging lihat nilai publish
    if (data.publish === "published") { 
        $(row).addClass('published-row');
    } else {
        $(row).removeClass('published-row');
    }
    }
});
    
            // Fungsi untuk delete
            window.delConfirm = function(id) {
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Data ini akan dihapus secara permanen!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' },
                            type: "DELETE",
                            url: "{{ route('onduty.destroy', '') }}/" + id,
                            success: function(response) {
                                swal('Berhasil', 'Data berhasil dihapus!', 'success')
                                    .then(() => table.ajax.reload());
                            },
                            error: function(xhr) {
                                let errorMsg = 'Terjadi kesalahan. Silakan coba lagi.';
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMsg = xhr.responseJSON.message;
                                }
                                swal('Gagal', errorMsg, 'error');
                            }
                        });
                    }
                });
            }
    
            // Fungsi untuk toggle publish
          // Fungsi untuk toggle publish/unpublish
            window.togglePublish = function(id, isPublished) {
                let newState = isPublished ? "no" : "published";
                let message = `Apakah Anda ingin mengubah status ${newState} ?`;

                swal({
                    title: "Ubah Status?",
                    text: message,
                    icon: "info",
                    buttons: true,
                    dangerMode: false
                }).then((willToggle) => {
                    if (willToggle) {
                        $.ajax({
                            headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' },
                            type: "POST",
                            url: "{{ route('onduty.togglePublish', '') }}/" + id,
                            data: { publish: newState },
                            success: function(response) {
                                swal("Berhasil", `Status berhasil diubah menjadi ${newState}!`, "success")
                                    .then(() => table.ajax.reload()); // Reload tabel agar status terbaru tampil
                            },
                            error: function(xhr) {
                                let errorMsg = "Terjadi kesalahan. Silakan coba lagi.";
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMsg = xhr.responseJSON.message;
                                }
                                swal("Gagal", errorMsg, "error");
                            }
                        });
                    }
                });
            }
        });
    </script>
    
@endpush
