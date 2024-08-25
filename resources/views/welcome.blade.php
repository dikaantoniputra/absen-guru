<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head')
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
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo-pirngadi.png') }}" alt="" height="150" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Aplikasi Terpadu Pirngdi</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">
                            
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0 mb-4">Selamat Datang <br/> {{ auth()->user()->name ?? '' }}</h4>
                                <img src="{{ asset('assets/images/users/user-11.jpg') }}" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                               
                                <p class="text-muted my-4">Harap Setelah Memakai Aplikasi Logout Terlebih Dahulu</p>

                            </div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <div class="mb-0 text-center d-grid">
                                    <button class="btn btn-danger" type="submit"> Log Out </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Not you? return <a href="pages-login.html" class="text-dark ms-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div> --}}
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
  
    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    
</body>

</html>
