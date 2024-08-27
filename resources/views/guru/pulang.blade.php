<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('') }}assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->

    <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @include('include.head')
</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="text-center">   
                        {{-- <a href="index.html">
                            <img src="{{ asset('assets/images/logo-pirngadi.png') }}" alt="" height="150" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Lakukan Pengisian Foto Dengan Max Ukuran Foto 15mb (jbg/png)</p> --}}
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
                    
                  <!-- Modal -->
                  <div id="danger-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content modal-filled bg-danger">
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="dripicons-wrong h1 text-white"></i>
                                    <h4 class="mt-2 text-white">Absen Dinyatakan Gagal</h4>
                                    <p class="mt-3 text-white">  {{ session('error') }}</p>
                                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{ route('absen.guru') }}" class="btn btn-success">Lakukan Absen Datang</a>
                                <a href="{{ route('guru.dashboard') }}" class="btn btn-primary">Menu</a>
                            </div>
                            <div class="text-center mb-1">
                                <h4 class="text-uppercase mt-0 mb-4">Selamat Datang <br/> {{ auth()->user()->name ?? '' }} </h4>
                                <img src="{{ asset('assets/images/users/user-11.jpg') }}" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                               
                            </div>

                            <form method="POST" action="{{ route('absenpulangguru') }}" id="form" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <h4 class="header-title">Masukan Absen Pulang</h4>
                                    <p class="sub-header">
                                        Masukan Foto Dengan Format jpeg,png,jpg
                                    </p>
        
                                    <input type="file" data-plugins="dropify"  name="gambar" data-height="400" />


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

    <script>
        @if(session('error'))
            $(document).ready(function() {
                $('#danger-alert-modal').modal('show');
            });
        @endif
    </script>
    
    
</body>

</html>
