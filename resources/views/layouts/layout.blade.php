<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'GeekHub')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor_bt/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor_bt/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('vendor_bt/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor_bt/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor_bt/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{asset('css/variables.css')}}" rel="stylesheet">
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
  <link href="{{asset('css/register.css')}}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @yield('body')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor_bt/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor_bt/aos/aos.js')}}"></script>
  <script src="{{asset('vendor_bt/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</html>
