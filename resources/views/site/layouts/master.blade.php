@php
$lang = LaravelLocalization::getCurrentLocale();
if ($lang == 'ar') {
    $dir = 'rtl';
} else {
    $dir = 'ltr';
}
@endphp
<!DOCTYPE HTML>
<html lang="{{ $lang }}" dir="{{ $dir }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <livewire:styles />
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> موقع سوق التجار </title>

    <link href="{{ Storage::url('site_assets/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="{{ Storage::url('site_assets/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ Storage::url('site_assets/css/main.css') }}">

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ Storage::url('site_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('site_assets/css/owl.theme.default.min.css') }}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ Storage::url('site_assets/css/all.min.css') }}">

    <!-- Bootstrap4 files-->
    <script src="{{ Storage::url('site_assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    @if ($lang == 'ar')
    <link href="{{ Storage::url('site_assets/css/bootstrap-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet"> 
    <style>
        a , p , h1 , h2 , h3 , h4 , h5 , div , span , table , thead , tbody , button ,  th , tr , td {
            font-family: 'Cairo', sans-serif;
            font-weight: bold !important;
        } 

        .btn-primary {
            background-color:#6B14BE !important;
            border-color :#6B14BE !important;

        }
        .search-header {
            border-color :#6B14BE !important;
        }

        .icon-area i {
            color : #6B14BE !important;
        }
        .text-primary {
            color : #6B14BE !important;
        }

    </style>
    @else
    <link href="{{ Storage::url('site_assets/css/bootstrap3661.css') }}" rel="stylesheet" type="text/css"/>
    @endif

    <style>
        .prevArrow {
            top : 120px;
            display:block;
            z-index: 100;
            position : absolute;
        }
        .nextArrow {
           top : 120px;
           display:block;
           z-index: 100;
           position : absolute;
           left : -8px;
       }


   </style>

   <!-- Font awesome 5 -->
   <link href="{{ Storage::url('site_assets/fonts/fontawesome/css/all.min3661.css') }}" type="text/css" rel="stylesheet">
   @yield('styles')
   <link href="{{ Storage::url('site_assets/css/ui3661.css') }}" rel="stylesheet" type="text/css"/>
   <link href="{{ Storage::url('site_assets/css/responsive3661.css') }}" rel="stylesheet" type="text/css" />
   <script src="{{ Storage::url('site_assets/js/script3661.js') }}" type="text/javascript"></script>
   <script src="{{ Storage::url('site_assets/js/owl.carousel.min.js') }}"></script>
   <script src="{{ Storage::url('site_assets/js/main.js') }}"></script>
   <script src="{{ Storage::url('site_assets/js/all.min.js') }}"></script>

   @yield('scripts')
   <livewire:scripts />

</head>
<body>

    @include('site.layouts.header')

    @yield('page_content')

    @include('site.layouts.footer')


            <script>
            var openmenu = document.getElementById("openmenu");
            var mobilenavbar = document.getElementById("mobile-navbar");
            var closemobilenav = document.getElementById("closemobilenav");
            openmenu.onclick = function(){
                mobilenavbar.style.left = "0";
            }
            closemobilenav.onclick = function(){
                mobilenavbar.style.left = "-100%"
            }
        </script>

</body>

<!-- Mirrored from bootstrap-ecommerce.com/templates/alistyle-html/page-index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Sep 2022 13:01:37 GMT -->
</html>