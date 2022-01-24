<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - {{ basic_information()->website_title }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('ass_vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('ass_vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('ass_vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('ass_vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"
        rel="stylesheet" />
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('ass_vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('ass_vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- iCheck -->
    <link href="{{ asset('ass_vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('ass_vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('ass_vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" />
    <!-- Switchery -->
    <link href="{{ asset('ass_vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('ass_vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('ass_vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="//cdn.materialdesignicons.com/3.8.95/css/materialdesignicons.min.css" rel="stylesheet">
    @stack('style')
    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/util.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('courier.layout.inc.sidebar')
            @include('courier.layout.inc.header')
            @yield('content')
            @include('courier.layout.inc.footer')
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('ass_vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('ass_vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('ass_vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('ass_vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('ass_vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('ass_vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('ass_vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('ass_vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('ass_vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('ass_vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('ass_vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('ass_vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('ass_vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('ass_vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('ass_vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('ass_vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('ass_vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('ass_vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('ass_vendors/starrr/dist/starrr.js') }}"></script>
    @stack('scripts')
    <style type="text/css">
        #datatable-buttons_filter {
            width: 44%
        }

    </style>
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
