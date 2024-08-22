<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head')
</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">   
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo-pirngadi.png') }}" alt="" height="150" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Lakukan Absen 1 Hari 1X Jika ada kendala harap hubungi admin</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{ route('absen.guru.pulang') }}" class="btn btn-warning color-white">Lakukan Absen Pulang</a>
                                <a href="{{ route('guru.dashboard') }}" class="btn btn-primary">Menu</a>
                            </div>
                            <div class="text-center mb-1">
                                <h4 class="text-uppercase mt-0 mb-4">Selamat Datang <br/> {{ auth()->user()->name ?? '' }}</h4>
                                <img src="{{ asset('assets/images/users/user-11.jpg') }}" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                               
                            </div>

                            <form method="POST" action="{{ route('absenmasukguru') }}" id="form" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <h4 class="header-title">Masukan Absen Masuk </h4>
                                    <p class="sub-header">
                                        Masukan Foto Dengan Format jpeg,png,jpg
                                    </p>
        
                                    <input type="file" data-plugins="dropify"  name="gambar" data-height="200" />


                                </div> <!-- end card-body-->

                                <div class="mb-0 text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Input Absen  </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                           
                           
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor -->
    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>

    <!-- Plugins js -->
    <script src="{{ asset('') }}assets/libs/dropzone/min/dropzone.min.js"></script>
    <script src="{{ asset('') }}assets/libs/dropify/js/dropify.min.js"></script>

    <!-- Init js-->
    <script src="{{ asset('') }}assets/js/pages/form-fileuploads.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.min.js"></script>
    
</body>

</html>
