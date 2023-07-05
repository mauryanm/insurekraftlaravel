
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="admin, dashboard">
        <meta name="author" content="DexignZone">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Dompet : Payment Admin Template">
        <meta property="og:title" content="Dompet : Payment Admin Template">
        <meta property="og:description" content="Dompet : Payment Admin Template">
        <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no">
        <title>@yield('title',"Admin")</title>
        <link rel="shortcut icon" type="image/png" href="{{ URL::to('assets/images/favicon.png') }}">
        <link href="{{ URL::to('assets/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
        <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    </head>
    <body class="vh-100">
        <style>    
            .invalid-feedback{
                font-size: 14px;
            }
        </style>
        <div class="authincation h-100">
            <div class="container h-100">
                @yield('content')
            </div>
        </div>
    <!-- Required vendors -->
    <script src="{{ URL::to('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/custom.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ URL::to('assets/js/styleSwitcher.js') }}"></script>
    @yield('script')
</body>
</html>