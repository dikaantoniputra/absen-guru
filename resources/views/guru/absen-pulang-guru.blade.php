@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<!-- App css -->

<link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

<!-- icons -->
<link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
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
                            @forelse ($absenPulang as $absenPulang)
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
                                    $dayName = $days[$absenPulang->created_at->format('l')];
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absenPulang->user->name }}</td>
                                    
                                    <td>{{ $dayName }}, Tgl - {{ $absenPulang->created_at->format('d') }}</td>
                                    <td>{{ $absenPulang->created_at->format('M') }}</td>
                                    <td>{{ $absenPulang->created_at->format('H:i') }}</td>

                                    <td>
                                        @if ($absenPulang->status == 0)
                                            Masuk
                                        @elseif($absenPulang->status == 1)
                                            Di Tolak
                                        
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($absenPulang->gambar))
    <!-- Thumbnail Image -->
    <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen" style="width: 50px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal">

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Absen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen">
                </div>
            </div>
        </div>
    </div>
@endif

                                    </td>
                                   

                                </tr>
                                <div id="modal-{{ $absenPulang->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{ $absenPulang->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Absen Masuk ID: {{ $dayName }}, Tgl - {{ $absenPulang->created_at->format('d') }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="field-1-{{ $absenPulang->id }}" class="form-label">Name</label>
                                                            <input type="text" class="form-control"  value="{{ $absenPulang->user->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="field-2-{{ $absenPulang->id }}" class="form-label">Surname</label>
                                                            <input type="text" class="form-control" value="{{ $absenPulang->user->kategori }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if(isset($absenPulang->gambar))
                                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="First slide">
                                                        @else
                                                        
                                                        @endif
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <label for="field-7-{{ $absenPulang->id }}" class="form-label">Personal Info</label>
                                                            <textarea class="form-control" id="field-7-{{ $absenPulang->id }}">{{ $absenPulang->personal_info }}</textarea>
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

<script src="{{ asset('') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('') }}/assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('') }}/assets/libs/feather-icons/feather.min.js"></script>

<!-- third party js -->
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