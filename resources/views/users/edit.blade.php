@extends('layouts.layout')

@section('title', 'Editar Informações - GeekHub')

@section('body')

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
            <br>

            <!-- Icon -->
            <div class="fadeIn first">
               Olá, {{$user->name}}!          
            </div>
            <br>

            <!-- Login Form -->
            <form method="POST" action="{{ route('user.updt', ['id' => $user->id]) }}">
                @method('PUT')
                @csrf
                
                <div class="form-group">
                    <label class="label-left">Nome:</label>
                </div>
                <input type="text" id="name" class="fadeIn second" name="name" placeholder="digite seu nome" value="{{$user->name}}">
                <br>
                <br>
                <div class="form-group">
                    <label>Email:</label>
                </div>
                <input type="text" id="email" class="fadeIn third" name="email" placeholder="digite seu email" value="{{$user->email}}">
                <br>
                <br>
                <div class="form-group">
                    <label class="label-left">Data de Nascimento:</label>
                </div>
                <input type="date" id="date" class="fadeIn second" name="date" value="{{$user->date}}">
                <br>
                <br>
                <div class="form-group">
                    <label class="label-left">Senha:</label>
                </div>
                <input type="text" id="password" class="fadeIn second" name="password" placeholder="digite sua senha">
                <br>
                <br>
                <input type="submit" class="fadeIn fourth" value="Atualizar">
            </form>

        

    </div>

    @endsection

  