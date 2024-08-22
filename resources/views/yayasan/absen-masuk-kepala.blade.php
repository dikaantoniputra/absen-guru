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
                
            
                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                        
                                <th>Tgl</th>
                                <th>Bulan</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Gambar</th>
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
                                        @if(isset($absenMasuk->gambar))
                                        <!-- Thumbnail Image -->
                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenMasuk->gambar) }}" alt="Gambar Absen" style="width: 50px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal">
    
                                        <!-- Modal -->
    
                                        @endif
    
                                    </td>
    
                                    </tr>
                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Gambar Absen</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="{{ asset('gambar/' . $absenMasuk->gambar) }}" alt="Gambar Absen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@endpush
