<?php

namespace App\Http\Controllers;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'tipo_publi' => 'required|exists:tipo_publicacaos,id',
        'titulo' => 'required|string',
        'sinopse' => 'required|string',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Garante que o diretório exista

    // Armazena a imagem no diretório específico
    $img = $request->file('img')->store('assets/imgPubli', 'public');

    $publicacao = new Publicacao([
        'tipo_publi' => $request->input('tipo_publi'),
        'titulo' => $request->input('titulo'),
        'sinopse' => $request->input('sinopse'),
        'img' => $img,
    ]);

    $publicacao->save();

    // Agora, recupere as publicações mais recentes
    $filme = Publicacao::where('tipo_publi', 1)->latest()->first();
    $jogo = Publicacao::where('tipo_publi', 2)->latest()->first();
    $livro = Publicacao::where('tipo_publi', 3)->latest()->first();

    return view('users.indexAdmin', [
        'filme' => $filme,
        'jogo' => $jogo,
        'livro' => $livro
    ]);
}

}


