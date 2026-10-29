<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} &mdash; {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/media/favicon/favicon.ico') }}" type="image/x-icon" />

    <!-- Primary Meta Tags -->
    <meta name="keywords" content="Rafandra Eternal Nusantara, Rafandra Nusantara, Rafandra" />
    <meta name="author" content="Rafandra Eternal Nusantara" />
    <meta name="title" content="Rafandra Nusantara" />
    <meta name="description"
        content="Rafandra Nusantara is a company committed to supporting sustainability through the export of eco-friendly products." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rafandranusantara.com" />
    <meta property="og:author" content="Rafandra Eternal Nusantara" />
    <meta property="og:title" content="Rafandra Nusantara" />
    <meta property="og:description"
        content="Rafandra Nusantara is a company committed to supporting sustainability through the export of eco-friendly products." />
    <meta property="og:image" content="{{ asset('assets/media/meta-thumb.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://rafandranusantara.com" />
    <meta property="twitter:title" content="Rafandra Nusantara" />
    <meta property="twitter:description"
        content="Rafandra Nusantara is a company committed to supporting sustainability through the export of eco-friendly products." />
    <meta property="twitter:image" content="{{ asset('assets/media/meta-thumb.png') }}" />

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Vendor css -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet" />
    <!-- Custom style -->
    @stack('styles')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- Sidenav Menu Start -->
        @include('layouts.sidenav')
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        @include('layouts.topbar')
        <!-- Topbar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
            <div class="page-container">
                @yield('content')
            </div>
            <!-- container -->

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <!-- Custom script -->
    <script>
        window.APP_LOCALE = "{{ app()->getLocale() }}";
    </script>
    <script src="{{ asset('assets   /js/pages/timestamp.js') }}"></script>
    @stack('scripts')

    <script>
        $(document).ready(function() {
            @if (\Illuminate\Support\Facades\Session::get('failed_message'))
                $.alert({
                    title: '{{ __('notification.global.warning.title') }}',
                    content: '{{ \Illuminate\Support\Facades\Session::get('failed_message') }}',
                    type: 'red',
                    theme: 'material',
                    backgroundDismissAnimation: 'shake',
                    onOpenBefore: function() {
                        this.$title.css("color", "black");
                        this.$content.css("color", "black");
                    }
                });
            @endif

            @if (\Illuminate\Support\Facades\Session::get('success_message'))
                $.alert({
                    title: '{{ __('notification.global.information.title') }}',
                    content: '{{ \Illuminate\Support\Facades\Session::get('success_message') }}',
                    type: 'green',
                    theme: 'material',
                    backgroundDismissAnimation: 'shake',
                    onOpenBefore: function() {
                        this.$title.css("color", "black");
                        this.$content.css("color", "black");
                    }
                });
            @endif
        });
    </script>
</body>

</html>
