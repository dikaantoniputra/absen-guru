@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Filter Absen</h4>
                <form action="{{ route('absenmasuk.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date">Tanggal Mulai:</label>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Tanggal Sampai:</label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="name">Nama:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('laporan.tk.yayasan') }}" class="btn btn-secondary">Reset Filter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Tambah Masuk</h4>
                    <a type="submit" href="{{ route('absenmasuk.create') }}"
                        class="btn btn-primary waves-effect waves-light mb-4">Tambah
                        Absen</a>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Unit</th>
                                <th>Jabatan</th>
                                <th>Tgl</th>
                                <th>Bulan</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($absenMasuk as $absenMasuk)
                            @php
                                    $days = [
                                        'Sunday' => 'Minggu',
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu'
                                    ];
                                    $dayName = $days[$absenMasuk->created_at->format('l')];
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absenMasuk->user->name }}</td>
                                    <td>{{ $absenMasuk->user->kategori }}</td>
                                    <td>{{ $absenMasuk->user->role }}</td>
                                    <td>{{ $dayName }}, Tgl - {{ $absenMasuk->created_at->format('d') }}</td>
                                    <td>{{ $absenMasuk->created_at->format('M') }}</td>
                                    <td>{{ $absenMasuk->created_at->format('H:i') }}</td>

                                    <td>
                                        @if ($absenMasuk->status == 0)
                                            Masuk
                                        @elseif($absenMasuk->status == 1)
                                            Di Tolak
                                        
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                       
                                        <button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-{{ $absenMasuk->id }}">View</button>
                                        <a href="{{ route('absenmasuk.edit', $absenMasuk->id) }}" class="btn btn-warning btn-xs waves-effect waves-light">Edit</a>
                                        <form action="{{ route('absenmasuk.destroy', $absenMasuk->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs waves-effect waves-light">Hapus</button>
                                        </form>
                                    </td>

                                </tr>
                                <div id="modal-{{ $absenMasuk->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{ $absenMasuk->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Absen Masuk ID: {{ $dayName }}, Tgl - {{ $absenMasuk->created_at->format('d') }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="field-1-{{ $absenMasuk->id }}" class="form-label">Name</label>
                                                            <input type="text" class="form-control"  value="{{ $absenMasuk->user->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="field-2-{{ $absenMasuk->id }}" class="form-label">Surname</label>
                                                            <input type="text" class="form-control" value="{{ $absenMasuk->user->kategori }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if(isset($absenMasuk->gambar))
                                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenMasuk->gambar) }}" alt="First slide">
                                                        @else
                                                        
                                                        @endif
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <label for="field-7-{{ $absenMasuk->id }}" class="form-label">Personal Info</label>
                                                            <textarea class="form-control" id="field-7-{{ $absenMasuk->id }}">{{ $absenMasuk->personal_info }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                            @empty
                                <div>
                                    Data Kosong
                                </div>

                             

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('after-script')
<script src="{{ asset('') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('') }}assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="{{ asset('') }}assets/js/app.min.js"></script>

<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>


@endpush
