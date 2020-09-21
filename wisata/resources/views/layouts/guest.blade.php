<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dist/healthcoach/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/healthcoach/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/healthcoach/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/healthcoach/css/style.css') }}">
</head>
<body>
    @include('components.guest-nav')
    
    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 col-lg-8">

                    <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Wisata Jambi. All rights reserved | Template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-md-6 col-lg-4 text-md-right">
                        <p class="mb-0 list-unstyled">
                            <a class="mr-md-3" href="{{ route('tac') }}">Terms and Conditions</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="{{ asset('dist/healthcoach/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/popper.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery.timepicker.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist/healthcoach/js/scrollax.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('dist/healthcoach/js/main.js') }}"></script>

        @yield('scripts')
    
    </body>
    </html>
