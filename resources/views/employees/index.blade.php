@extends('layouts.main')

@section('title', 'Data Employee')

@push('add-plugins-css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-dNr2K8gkk8cTV3vR1Kp9K6msV+2e8u2b/1kXubzmPS3P9KxnjEe+N1F+I2Vz9TqqePJ0Gqae7s+Xf5l5e5UMaQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Employee</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Employee</a></li>
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
                <h4 class="card-title">Daftar Employee</h4>
                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-round ml-auto">
                    <i class="fas fa-user-plus"></i> Tambah Employee
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="employee-table" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Fungsi</th>
                            <th>Lokasi</th>
                            <th>No HP</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan di-load secara server-side via AJAX -->
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            let table = $('#employee-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}", // Pastikan route ini mengembalikan JSON untuk DataTables
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama', name: 'nama' },
                    { data: 'jabatan', name: 'jabatan' },
                    { data: 'fungsi', name: 'fungsi' },
                    { data: 'lokasi', name: 'lokasi' },
                    { data: 'nohp', name: 'nohp' },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            console.log('Foto:', data); // Debug: Lihat di console
                            if (data && data.trim() !== '') {
                                // Contoh jika 'photo' di DB bernilai 'employees/andi.jpg'
                                return `
                                    <img src="{{ asset('storage') }}/${data}" 
                                        alt="${row.nama}" 
                                        style="width:50px; height:50px; object-fit:cover;">
                                `;
                            }
                            // Jika 'photo' kosong
                            return `<i class="fas fa-user"></i>`;
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
