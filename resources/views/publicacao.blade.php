<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>Resenha Geek</title>
      
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
      
        <!-- =======================================================
        * Template Name: ZenBlog
        * Updated: Sep 18 2023 with Bootstrap v5.3.2
        * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
        * Author: BootstrapMade.com
        * License: https:///bootstrapmade.com/license/
        ======================================================== -->
      </head>
    <body>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="card mb-3">
                  <center>
                    {!!$pub->iframe_trailer!!}
                  </center>
                    <div class="card-body">
                      <h5 class="card-title">{{$pub->titulo}}</h5>
                      <p class="card-text">Média dos Criticos: {{$media_c}}</p>
                      <p class="card-text">Média do público: {{$media_p}}</p>
                      <p class="card-text text-justify">Sinopse: <br>{{$pub->sinopse}}</p>
                    </div>
                  </div>
            </div>
            <div class="row align-items-start">
              <small>Críticos</small>
              @if ($resenhas_c->isNotEmpty())
                @foreach ($resenhas_c as $r)
                  <div class="col-12 mt-3 mb-3">
                    <small class="align-items-top"><i class="bi bi-person-fill"></i> {{$r->name}}</small>
                    <p>{{$r->descricao}}</p>
                  </div>
                @endforeach
              @else
                <div class="col"><p class="fst-italic"><i class="bi bi-info-circle"></i> Nenhuma resenha foi registrada ainda</p> </div>
              @endif
            </div>
              @if (Auth::user()->tipo_user == 2)
                  <div class="row">
                    <form action="/create/resenha" method="post">
                      <label for="nota">Nota</label>
                      <input type="number" name="nota" id=""><br>
                      <textarea name="resenha" id="" cols="30" rows="10"></textarea><br>
                      <button class="btn btn-success">Cadastrar</button>
                    </form>
                  </div>
              @endif
              <div class="">
                <small>Publico geral</small>
              @if ($resenhas_p->isNotEmpty())
                @foreach ($resenhas_p as $r)
                  <div class="col border-bottom border-top mt-1 mb-1">
                    <small class="align-items-top"><i class="bi bi-person-fill"></i> {{$r->name}}</small>
                    <p>{{$r->descricao}}</p>
                  </div>
                @endforeach
              @else
                <div class="col"><p class="fst-italic"><i class="bi bi-info-circle"></i> Nenhuma resenha foi registrada ainda</p> </div>
              @endif
              </div>
              @if (Auth::user()->tipo_user == 1)
                  <div class="row mt-2">
                    <small>Faça sua resenha:</small>
                    <form action="/store/resenha" method="post">
                      @csrf
                      @error('nota')
                          <span class="text-danger">{{$message}}</span><br>
                      @enderror
                      <label for="nota">Nota</label>
                      <input type="number" name="nota" step="0.01" id=""><br>
                      @error('resenha')
                          <span class="text-danger">{{$message}}</span><br>
                      @enderror
                      <label for="resenha">Resenha: </label>
                      <textarea name="resenha" id="" cols="30" rows="10"></textarea><br>
                      <input type="hidden" name="pub" value="{{$pub->id}}">
                      <button class="btn btn-success">Cadastrar</button>
                    </form>
                  </div>
              @endif
        </div>
        
    </body>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor_bt/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor_bt/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor_bt/aos/aos.js')}}"></script>
  <script src="{{asset('vendor_bt/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
</html>