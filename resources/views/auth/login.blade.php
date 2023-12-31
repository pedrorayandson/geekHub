<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Resenha Geek</title>
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

  <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>ZenBlog</h1>
            </a>
            <div class="position-relative">
                <a href="#" class="mx-2 js-search-open"></a>
                <a href="/"><button type="button" class="btn btn-outline-secondary">Página Inicial</button></a>  
            </div>

        </div>

    </header><!-- End Header -->
    <br>
    <br>
    <br>
    <br>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <i class="bi bi-person"></i>            
            </div>
            <br>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="label-left">Email:</label>
                </div>
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
                <br>
                <br>

                <div class="form-group">
                    <label>Senha:</label>
                </div>
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="Senha">
                <br>
                <br>
                <input type="submit" class="fadeIn fourth" value="Login">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="/register">Criar Conta</a>
            </div>

    </div>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor_bt/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor_bt/aos/aos.js')}}"></script>
  <script src="{{asset('vendor_bt/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
