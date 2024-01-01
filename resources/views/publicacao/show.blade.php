
@extends('layouts.layout')

@section('title', $pub->titulo)

@section('body')
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
        
    @endsection