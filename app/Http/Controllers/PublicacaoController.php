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

    $img = $request->file('img')->store('public/assets/imgPubli');
    $publicacao = new Publicacao([
        'tipo_publi' => $request->input('tipo_publi'),
        'titulo' => $request->input('titulo'),
        'sinopse' => $request->input('sinopse'),
        'img' => $img,
    ]);

    $publicacao->save();

    return redirect('/admin');
}

}
