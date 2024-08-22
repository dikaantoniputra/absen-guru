<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                @if (auth()->user()->role == 'admin')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('admin.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ url('/harian') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Harian / Pebandingan
                        </a>
            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('user.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> MANAJEMEN User </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('absenmasuk.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> MANAJEMEN Absen Masuk </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('absenpulang.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> MANAJEMEN Absen Pulang </span>
                        </a>
                    </li>
                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="layouts-horizontal.html" class="dropdown-item">Unit TK</a>
                            <a href="index.html" class="dropdown-item">Unit SD</a>
                            <a href="layouts-preloader.html" class="dropdown-item">Unit SMP</a>
                            <a href="layouts-preloader.html" class="dropdown-item">Unit SMP</a>
                        </div>
                    </li>
                </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'kepala-sekolah')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('kepala.unit') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('absen.kepsek') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Lakukan Absen
                        </a>
            
                    </li>

                   

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('data.karyawan.unit') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Data Karyawan Unit </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Kepala Sekolah <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('masuk.kepsek') }}" class="dropdown-item">Absen Masuk </a>
                            <a href="{{ route('pulang.kepsek') }}" class="dropdown-item">Absen Pulang</a>
                           
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Karyawan Unit <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('masuk.karyawan') }}" class="dropdown-item">Absen Masuk Karyawan</a>
                            <a href="{{ route('pulang.karyawan') }}" class="dropdown-item">Absen Pulang Karyawan</a>
                           
                        </div>
                    </li>
                        
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('user.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Laporan Absen Unit </span>
                        </a>
                    </li>


                </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'guru')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('guru.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('karyawan.masuk') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Absen Masuk </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('karyawan.pulang') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Absen Pulang </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('absen.guru') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Lakukan Absen </span>
                        </a>
                    </li>
                        
                    
                </ul> <!-- end navbar-->
                @endif
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->