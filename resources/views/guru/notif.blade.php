<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('') }}assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->

    <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo-dark.png" alt="" height="22" class="logo-light mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center">
                                <h1 class="text-error">Absen Berhasil</h1>
                                <h3 class="mt-3 mb-2">Anda Bisa cek Daftar Hadir Anda</h3>
                                <p class="text-muted mb-3">Jika Ada Kendala Haraf Hubungi Team IT Yayasan <a href="" class="text-dark"><b>Support</b></a></p>

                                <a href="{{ route('absen.kepsek') }}" class="btn btn-danger waves-effect waves-light"><i class="fas fa-home me-1"></i> Back to Home</a>
                            </div>


                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

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
