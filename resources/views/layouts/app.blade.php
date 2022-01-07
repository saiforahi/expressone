<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ basic_information()->company_name }}</title>

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css') }}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}">
    <!-- Fonts Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/font-elegant/elegant.css') }}">
    <!-- OwlCarousel2 Slider Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/owl.carousel.2/assets/owl.carousel.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css') }}">

</head>
<body>
    <div id="home">
        <!-- Preloader -->
        @stack('loader')
        <!-- /.Preloader -->

        <!-- Main Wrapper -->
        <main class="wrapper">

            <!-- Header -->
            @include('layouts.inc.header')
            <!-- /.Header -->

            <!-- Content Wrapper -->
            @yield('content')
            <!-- /.Content Wrapper -->

            <!-- Footer -->
            @include('layouts.inc.footer')

        </main>

        <!-- Top -->
        <div class="to-top theme-clr-bg transition"><i class="fa fa-angle-up"></i></div>
        <style type="text/css">
            .invalid-feedback {
                color: red;
            }

        </style>
    </div>
    {{-- {{ \TawkTo::widgetCode('https://tawk.to/chat/61a22a319099530957f6e93a/1flgn9klr') }} --}}
    <!-- Main Jquery JS -->
    <script src="/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Bootstrap Select JS -->
    <script src="/assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- OwlCarousel2 Slider JS -->
    <script src="/assets/plugins/owl.carousel.2/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Sticky Header -->
    <script src="/assets/js/jquery.sticky.js"></script>
    <!-- Wow JS -->
    <script src="/assets/plugins/WOW-master/dist/wow.min.js" type="text/javascript"></script>
    <!-- Theme JS -->
    <script src="/assets/js/theme.js" type="text/javascript"></script>
    @stack('script')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/61a22a319099530957f6e93a/1flgn9klr';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
        $(document).ready(function() {
            //console.log('okay');
            //Hiding flash message
            $('#msgDiv').delay(1500).hide(500);
        });
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
