@extends('layouts.main')

@section('title', 'Data Locations')

@push('add-plugins-css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Locations</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Locations</a>
            </li>
        </ul>
    </div>

    @if(session()->has('success'))
       <div class="alert alert-success">
         {{ session('success') }}
       </div>
    @endif

    <div class="card">
        <div class="card-header">
           <div class="d-flex align-items-center">
              <h4 class="card-title">Daftar Lokasi</h4>
              <a href="{{ route('locations.create') }}" class="btn btn-primary btn-round ml-auto">
                  <i class="fas fa-plus"></i> Tambah Lokasi
              </a>
           </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table id="locations-table" class="display table table-striped table-hover">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Nama Lokasi</th>
                      <th>Aksi</th>
                   </tr>
                </thead>
                <tbody>
                    <!-- Data akan di-load secara AJAX -->
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('add-plugins-js')
    <!-- jQuery dan DataTables JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#locations-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('locations.index') }}", // Route ini harus mengembalikan JSON DataTables
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama_lokasi', name: 'nama_lokasi' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
