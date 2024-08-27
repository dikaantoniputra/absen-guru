@extends('layout.master')

@section('content')
    @if (auth()->user()->role == 'admin')
        
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-success float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit TK</a></h4>
                    <p class="text-success text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>

                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit TK 
                    </p>

                    @php
                        // Hitung persentase kehadiran

                        $jumlahAbsenMasukTK = $jumlahAbsenMasukTK ?? 0;
                        $jumlahUserTK = $jumlahUserTK ?? 0;

                        $persentaseKehadiran = $jumlahUserTK > 0 ? ($jumlahAbsenMasukTK / $jumlahUserTK) * 100 : 0;
                    @endphp

                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukTK ?? '' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangtK ?? ''}}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserTK }}</h5>       
                    </div>

                    <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran, 2) }}%</span></h5>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-success progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran }}%; visibility: visible; animation-name: animationProgress;">
                            </div><!-- /.progress-bar .progress-bar-danger -->
                        </div><!-- /.progress .no-rounded -->

                </div>
            </div>
            
        </div><!-- end col-->

        <div class="col-xl-3">
            <div class="card">
            <div class="card-body project-box">
                <div class="badge bg-primary float-end">Absen Harian</div>
                <h4 class="mt-0"><a href="" class="text-dark">Unit SD</a></h4>
                <p class="text-primary text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SD
                </p>

                @php
                // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                    $jumlahUserSD = $jumlahUserSD ?? 0;
                    $jumlahAbsenMasukSd = $jumlahAbsenMasukSd ?? 0;
                
                    // Hitung persentase kehadiran
                    $persentaseKehadiran2 = $jumlahUserSD > 0 ? ($jumlahAbsenMasukSd / $jumlahUserSD) * 100 : 0;
                @endphp
            
                <ul class="list-inline">
                    <li class="list-inline-item me-4">
                        <h4 class="mb-0">{{ $jumlahAbsenMasukSd ?? '' }}</h4>
                        <p class="text-muted">Absen Datang</p>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="mb-0">{{ $jumlahAbsenPulangSd ?? ''}}</h4>
                        <p class="text-muted">Absen Pulang</p>
                    </li>
                </ul>

                <div class="project-members mb-2">
                    <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSD }}</h5>       
                </div>

                <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran2, 2) }}%</span></h5>
                <div class="progress progress-bar-alt-primary progress-sm">
                    <div class="progress-bar bg-primary progress-animated wow animated animated"
                            role="progressbar" aria-valuenow="{{ $persentaseKehadiran2 }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $persentaseKehadiran2 }}%;">
                    </div><!-- /.progress-bar .progress-bar-danger -->
                </div><!-- /.progress .no-rounded -->

            </div>
            </div>
        </div><!-- end col-->

        <div class="col-xl-3">
            <div class="card">
            <div class="card-body project-box">
                <div class="badge bg-pink float-end">Absen Harian</div>
                <h4 class="mt-0"><a href="" class="text-dark">Unit SMP</a></h4>
                <p class="text-pink text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>
                <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMP
                </p>

                @php
                // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                    $jumlahUserSMP = $jumlahUserSMP ?? 0;
                    $jumlahAbsenMasukSmp = $jumlahAbsenMasukSmp ?? 0;
                
                    // Hitung persentase kehadiran
                    $persentaseKehadiran3 = $jumlahUserSMP > 0 ? ($jumlahAbsenMasukSmp / $jumlahUserSMP) * 100 : 0;
                @endphp
                
                <ul class="list-inline">
                    <li class="list-inline-item me-4">
                        <h4 class="mb-0">{{ $jumlahAbsenMasukSmp ?? '' }}</h4>
                        <p class="text-muted">Absen Datang</p>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="mb-0">{{ $jumlahAbsenPulangSmp ?? '' }}</h4>
                        <p class="text-muted">Absen Pulang</p>
                    </li>
                </ul>

                <div class="project-members mb-2">
                    <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMP }}</h5>
                  
                </div>
                

                <h5>Progress <span class="text-pink float-end">{{ number_format($persentaseKehadiran3, 2) }}%</span></h5>
                <div class="progress progress-bar-alt-pink progress-sm">
                    <div class="progress-bar bg-pink progress-animated wow animated animated"
                            role="progressbar" aria-valuenow="{{ $persentaseKehadiran3 }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $persentaseKehadiran3 }}%;">
                    </div><!-- /.progress-bar .progress-bar-danger -->
                </div><!-- /.progress .no-rounded -->

              

            </div>
            </div>
        </div><!-- end col-->

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-purple float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit SMA</a></h4>
                    <p class="text-purple text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMA
                    </p>

                    @php
                    // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                        $jumlahUserSMA = $jumlahUserSMA ?? 0;
                        $jumlahAbsenMasukSma = $jumlahAbsenMasukSma ?? 0;
                    
                        // Hitung persentase kehadiran
                        $persentaseKehadiran4 = $jumlahUserSMA > 0 ? ($jumlahAbsenMasukSma / $jumlahUserSMA) * 100 : 0;
                    @endphp
                
                
                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukSma  ??'' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangSma ??'' }}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMA }}</h5>
                        
                    </div>

                    <h5>Progress <span class="text-purple float-end">{{ $persentaseKehadiran4 }}%</span></h5>
                    <div class="progress progress-bar-alt-purple progress-sm">
                        <div class="progress-bar bg-purple progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran4 }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran4 }}%;">
                        </div><!-- /.progress-bar .progress-bar-danger -->
                    </div><!-- /.progress .no-rounded -->

                </div>
            </div>
            
        </div><!-- end col-->
    </div>
    <!-- end row -->


<!-- end row -->

<div class="row">
   

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mt-0 mb-3">Daftar Kehadiran Tercepat</h4>
                @if(isset($usersHariIni) && $usersHariIni->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <tr>
                                    <th>No</th>  
                                    <th>Nama</th>  
                                    <th>Jam</th>
                                    <th>Unit</th>
                                    <th>Guru</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersHariIni as $absenPulang)
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
    
                                    <td>{{ $absenPulang->created_at->format('H:i') }}</td>

                                    
                                    <td>{{ $absenPulang->user->kategori }}</td>

                                    <td>
                                        @if(isset($absenPulang->gambar))
                                        <!-- Thumbnail Image -->
                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen" style="width: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $absenPulang->id }}">
    
                                        <!-- Modal -->
    
                                        @endif
    
                                    </td>
    
                                    </tr>
                                    <div class="modal fade" id="imageModal{{ $absenPulang->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
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
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse

                        </tbody>
                    </table>
                </div>
                @else
                    <div class="text-center">Data Kosong</div>
                @endif
            </div>
        </div>

    </div><!-- end col -->

</div>
    @endif

    @if (auth()->user()->role == 'yayasan')


        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body project-box">
                        <div class="badge bg-success float-end">Absen Harian</div>
                        <h4 class="mt-0"><a href="" class="text-dark">Unit TK</a></h4>
                        <p class="text-success text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>

                        <p class="text-muted font-13">Persentasi Kehadiran Dari Unit TK 
                        </p>

                        @php
                            // Hitung persentase kehadiran

                            $jumlahAbsenMasukTK = $jumlahAbsenMasukTK ?? 0;
                            $jumlahUserTK = $jumlahUserTK ?? 0;

                            $persentaseKehadiran = $jumlahUserTK > 0 ? ($jumlahAbsenMasukTK / $jumlahUserTK) * 100 : 0;
                        @endphp

                        <ul class="list-inline">
                            <li class="list-inline-item me-4">
                                <h4 class="mb-0">{{ $jumlahAbsenMasukTK ?? '' }}</h4>
                                <p class="text-muted">Absen Datang</p>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="mb-0">{{ $jumlahAbsenPulangtK ?? ''}}</h4>
                                <p class="text-muted">Absen Pulang</p>
                            </li>
                        </ul>

                        <div class="project-members mb-2">
                            <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserTK }}</h5>       
                        </div>

                        <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran, 2) }}%</span></h5>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success progress-animated wow animated animated"
                                    role="progressbar" aria-valuenow="{{ $persentaseKehadiran }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $persentaseKehadiran }}%; visibility: visible; animation-name: animationProgress;">
                                </div><!-- /.progress-bar .progress-bar-danger -->
                            </div><!-- /.progress .no-rounded -->

                    </div>
                </div>
                
            </div><!-- end col-->

            <div class="col-xl-3">
                <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-primary float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit SD</a></h4>
                    <p class="text-primary text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SD
                    </p>

                    @php
                    // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                        $jumlahUserSD = $jumlahUserSD ?? 0;
                        $jumlahAbsenMasukSd = $jumlahAbsenMasukSd ?? 0;
                    
                        // Hitung persentase kehadiran
                        $persentaseKehadiran2 = $jumlahUserSD > 0 ? ($jumlahAbsenMasukSd / $jumlahUserSD) * 100 : 0;
                    @endphp
                
                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukSd ?? '' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangSd ?? ''}}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSD }}</h5>       
                    </div>

                    <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran2, 2) }}%</span></h5>
                    <div class="progress progress-bar-alt-primary progress-sm">
                        <div class="progress-bar bg-primary progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran2 }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran2 }}%;">
                        </div><!-- /.progress-bar .progress-bar-danger -->
                    </div><!-- /.progress .no-rounded -->

                </div>
                </div>
            </div><!-- end col-->

            <div class="col-xl-3">
                <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-pink float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit SMP</a></h4>
                    <p class="text-pink text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>
                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMP
                    </p>

                    @php
                    // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                        $jumlahUserSMP = $jumlahUserSMP ?? 0;
                        $jumlahAbsenMasukSmp = $jumlahAbsenMasukSmp ?? 0;
                    
                        // Hitung persentase kehadiran
                        $persentaseKehadiran3 = $jumlahUserSMP > 0 ? ($jumlahAbsenMasukSmp / $jumlahUserSMP) * 100 : 0;
                    @endphp
                    
                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukSmp ?? '' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangSmp ?? '' }}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMP }}</h5>
                      
                    </div>
                    

                    <h5>Progress <span class="text-pink float-end">{{ number_format($persentaseKehadiran3, 2) }}%</span></h5>
                    <div class="progress progress-bar-alt-pink progress-sm">
                        <div class="progress-bar bg-pink progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran3 }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran3 }}%;">
                        </div><!-- /.progress-bar .progress-bar-danger -->
                    </div><!-- /.progress .no-rounded -->

                  

                </div>
                </div>
            </div><!-- end col-->

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body project-box">
                        <div class="badge bg-purple float-end">Absen Harian</div>
                        <h4 class="mt-0"><a href="" class="text-dark">Unit SMA</a></h4>
                        <p class="text-purple text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                        <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMA
                        </p>

                        @php
                        // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                            $jumlahUserSMA = $jumlahUserSMA ?? 0;
                            $jumlahAbsenMasukSma = $jumlahAbsenMasukSma ?? 0;
                        
                            // Hitung persentase kehadiran
                            $persentaseKehadiran4 = $jumlahUserSMA > 0 ? ($jumlahAbsenMasukSma / $jumlahUserSMA) * 100 : 0;
                        @endphp
                    
                    
                        <ul class="list-inline">
                            <li class="list-inline-item me-4">
                                <h4 class="mb-0">{{ $jumlahAbsenMasukSma ??'' }}</h4>
                                <p class="text-muted">Absen Datang</p>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="mb-0">{{ $jumlahAbsenPulangSma ??'' }}</h4>
                                <p class="text-muted">Absen Pulang</p>
                            </li>
                        </ul>

                        <div class="project-members mb-2">
                            <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMA }}</h5>
                            
                        </div>

                        <h5>Progress <span class="text-purple float-end">{{ $persentaseKehadiran4 }}%</span></h5>
                        <div class="progress progress-bar-alt-purple progress-sm">
                            <div class="progress-bar bg-purple progress-animated wow animated animated"
                                    role="progressbar" aria-valuenow="{{ $persentaseKehadiran4 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $persentaseKehadiran4 }}%;">
                            </div><!-- /.progress-bar .progress-bar-danger -->
                        </div><!-- /.progress .no-rounded -->

                    </div>
                </div>
                
            </div><!-- end col-->
        </div>
       

        <div class="row">
        

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        

                        <h4 class="header-title mt-0 mb-3">Daftar Kehadiran Tercepat</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>No</th>  
                                            <th>Nama</th>  
                                            <th>Jam</th>
                                            <th>Unit</th>
                                            <th>Guru</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usersHariIni as $absenPulang)
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
            
                                            <td>{{ $absenPulang->created_at->format('H:i') }}</td>
        
                                            
                                            <td>{{ $absenPulang->user->kategori }}</td>

                                            <td>
                                                @if(isset($absenPulang->gambar))
                                                <!-- Thumbnail Image -->
                                                <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen" style="width: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $absenPulang->id }}">
            
                                                <!-- Modal -->
            
                                                @endif
            
                                            </td>
            
                                            </tr>
                                            <div class="modal fade" id="imageModal{{ $absenPulang->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
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

            </div><!-- end col -->

        </div>
@endif

    @if (auth()->user()->role == 'kepala-sekolah')
    <div class="row">
        @if (auth()->user()->kategori == 'tk')
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-success float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit TK</a></h4>
                    <p class="text-success text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>

                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit TK 
                    </p>

                    @php
                        // Hitung persentase kehadiran

                        $jumlahAbsenMasukTK = $jumlahAbsenMasukTK ?? 0;
                        $jumlahUserTK = $jumlahUserTK ?? 0;

                        $persentaseKehadiran = $jumlahUserTK > 0 ? ($jumlahAbsenMasukTK / $jumlahUserTK) * 100 : 0;
                    @endphp

                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukTK ?? '' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangtK ?? ''}}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserTK }}</h5>       
                    </div>

                    <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran, 2) }}%</span></h5>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-success progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran }}%; visibility: visible; animation-name: animationProgress;">
                            </div><!-- /.progress-bar .progress-bar-danger -->
                        </div><!-- /.progress .no-rounded -->

                </div>
            </div>
            
        </div><!-- end col-->
        @endif
        @if (auth()->user()->kategori == 'sd')
        <div class="col-xl-3">
            <div class="card">
            <div class="card-body project-box">
                <div class="badge bg-primary float-end">Absen Harian</div>
                <h4 class="mt-0"><a href="" class="text-dark">Unit SD</a></h4>
                <p class="text-primary text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SD
                </p>

                @php
                // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                    $jumlahUserSD = $jumlahUserSD ?? 0;
                    $jumlahAbsenMasukSd = $jumlahAbsenMasukSd ?? 0;
                
                    // Hitung persentase kehadiran
                    $persentaseKehadiran2 = $jumlahUserSD > 0 ? ($jumlahAbsenMasukSd / $jumlahUserSD) * 100 : 0;
                @endphp
            
                <ul class="list-inline">
                    <li class="list-inline-item me-4">
                        <h4 class="mb-0">{{ $jumlahAbsenMasukSd ?? '' }}</h4>
                        <p class="text-muted">Absen Datang</p>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="mb-0">{{ $jumlahAbsenPulangSd ?? ''}}</h4>
                        <p class="text-muted">Absen Pulang</p>
                    </li>
                </ul>

                <div class="project-members mb-2">
                    <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSD }}</h5>       
                </div>

                <h5>Progress <span class="text-success float-end">{{ number_format($persentaseKehadiran2, 2) }}%</span></h5>
                <div class="progress progress-bar-alt-primary progress-sm">
                    <div class="progress-bar bg-primary progress-animated wow animated animated"
                            role="progressbar" aria-valuenow="{{ $persentaseKehadiran2 }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $persentaseKehadiran2 }}%;">
                    </div><!-- /.progress-bar .progress-bar-danger -->
                </div><!-- /.progress .no-rounded -->

            </div>
            </div>
        </div><!-- end col-->
        @endif
        @if (auth()->user()->kategori == 'smp')
        <div class="col-xl-3">
            <div class="card">
            <div class="card-body project-box">
                <div class="badge bg-pink float-end">Absen Harian</div>
                <h4 class="mt-0"><a href="" class="text-dark">Unit SMP</a></h4>
                <p class="text-pink text-uppercase font-13">TGL : {{ date('d-m-Y') }}</p>
                <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMP
                </p>

                @php
                // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                    $jumlahUserSMP = $jumlahUserSMP ?? 0;
                    $jumlahAbsenMasukSmp = $jumlahAbsenMasukSmp ?? 0;
                
                    // Hitung persentase kehadiran
                    $persentaseKehadiran3 = $jumlahUserSMP > 0 ? ($jumlahAbsenMasukSmp / $jumlahUserSMP) * 100 : 0;
                @endphp
                
                <ul class="list-inline">
                    <li class="list-inline-item me-4">
                        <h4 class="mb-0">{{ $jumlahAbsenMasukSmp ?? '' }}</h4>
                        <p class="text-muted">Absen Datang</p>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="mb-0">{{ $jumlahAbsenPulangSmp ?? '' }}</h4>
                        <p class="text-muted">Absen Pulang</p>
                    </li>
                </ul>

                <div class="project-members mb-2">
                    <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMP }}</h5>
                  
                </div>
                

                <h5>Progress <span class="text-pink float-end">{{ number_format($persentaseKehadiran3, 2) }}%</span></h5>
                <div class="progress progress-bar-alt-pink progress-sm">
                    <div class="progress-bar bg-pink progress-animated wow animated animated"
                            role="progressbar" aria-valuenow="{{ $persentaseKehadiran3 }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $persentaseKehadiran3 }}%;">
                    </div><!-- /.progress-bar .progress-bar-danger -->
                </div><!-- /.progress .no-rounded -->

              

            </div>
            </div>
        </div><!-- end col-->
        @endif
        @if (auth()->user()->kategori == 'sma')
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body project-box">
                    <div class="badge bg-purple float-end">Absen Harian</div>
                    <h4 class="mt-0"><a href="" class="text-dark">Unit SMA</a></h4>
                    <p class="text-purple text-uppercase font-13">Tgl : {{ date('d-m-Y') }}</p>
                    <p class="text-muted font-13">Persentasi Kehadiran Dari Unit SMA
                    </p>

                    @php
                    // Pastikan nilai variabel tidak null dan bukan nol sebelum melakukan pembagian
                        $jumlahUserSMA = $jumlahUserSMA ?? 0;
                        $jumlahAbsenMasukSma = $jumlahAbsenMasukSma ?? 0;
                    
                        // Hitung persentase kehadiran
                        $persentaseKehadiran4 = $jumlahUserSMA > 0 ? ($jumlahAbsenMasukSma / $jumlahUserSMA) * 100 : 0;
                    @endphp
                
                
                    <ul class="list-inline">
                        <li class="list-inline-item me-4">
                            <h4 class="mb-0">{{ $jumlahAbsenMasukSma ??'' }}</h4>
                            <p class="text-muted">Absen Datang</p>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="mb-0">{{ $jumlahAbsenPulangSma ??'' }}</h4>
                            <p class="text-muted">Absen Pulang</p>
                        </li>
                    </ul>

                    <div class="project-members mb-2">
                        <h5 class="float-start me-3">Total Pegawai : {{ $jumlahUserSMA }}</h5>
                        
                    </div>

                    <h5>Progress <span class="text-purple float-end">{{ $persentaseKehadiran4 }}%</span></h5>
                    <div class="progress progress-bar-alt-purple progress-sm">
                        <div class="progress-bar bg-purple progress-animated wow animated animated"
                                role="progressbar" aria-valuenow="{{ $persentaseKehadiran4 }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $persentaseKehadiran4 }}%;">
                        </div><!-- /.progress-bar .progress-bar-danger -->
                    </div><!-- /.progress .no-rounded -->

                </div>
            </div>
            
        </div><!-- end col-->
        @endif

       
    </div>
   

    
@endif

    

    @if (auth()->user()->role == 'guru')
        <div class="row">



            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">


                        <h4 class="header-title mt-0 mb-3">Total Absen Bulanan Pulang & Pergi</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-success rounded-pill float-start mt-3">32% <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 8451 </h2>
                                <p class="text-muted mb-3">Revenue today</p>
                            </div>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-3">Absen Kehadiran</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-pink rounded-pill float-start mt-3">32% <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 158 </h2>
                                <p class="text-muted mb-3">Revenue today</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">


                        <h4 class="header-title mt-0 mb-4">Absen Pulang</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                    data-bgColor="#F9B9B9" value="58" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div>

                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">


                        <h4 class="header-title mt-0 mb-4">Absen Pulang</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="58" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div>
                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->



        </div>
        <!-- end row -->
    @endif
    <!-- end row -->
@endsection

@push('after-script')
@endpush
