<?php

namespace App\Http\Controllers;
use App\Models\Publicacao;
use App\Models\Resenha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PublicacaoController extends Controller
{
    public function create()
    {
        $this->authorize('create-pub', Auth::user());

        return view('cadastro.publicacao');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_publi' => 'required|exists:tipo_publicacaos,id',
            'titulo' => 'required|string',
            'sinopse' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'trailer' => 'required|string'
        ]);

        // Garante que o diretório exista

        // Armazena a imagem no diretório específico
        $img = $request->file('img')->store('assets/imgPubli', 'public');

        $publicacao = new Publicacao([
            'tipo_publi' => $request->input('tipo_publi'),
            'titulo' => $request->input('titulo'),
            'sinopse' => $request->input('sinopse'),
            'img' => $img,
            'trailer_url' => $request->post('trailer')
        ]);

        $publicacao->save();

        // Agora, recupere as publicações mais recentes
        $filme = Publicacao::where('tipo_publi', 1)->latest()->first();
        $jogo = Publicacao::where('tipo_publi', 2)->latest()->first();
        $livro = Publicacao::where('tipo_publi', 3)->latest()->first();

        /* return view('users.indexAdmin', [
            'filme' => $filme,
            'jogo' => $jogo,
            'livro' => $livro
        ]); */

        return view('cadastro.publicacao');
    }

    public function show($id)
    {
        $pub = DB::table('publicacaos')
            ->join('tipo_publicacaos', 'tipo_publicacaos.id', '=', 'publicacaos.tipo_publi')
            ->where('publicacaos.id', '=', $id)
            ->get('*')
            ->first();

        $resenhas_criticos = DB::table('resenhas', 'r')
            ->join('publicacao', 'publicacao.id', '=', 'r.publi_id')
            ->join('users', 'users.id', '=', 'r.user_id')
            ->where('users.tipo_user', '=', 3);

        $resenha_publico = DB::table('resenhas', 'r')
        ->join('publicacao', 'publicacao.id', '=', 'r.publi_id')
        ->join('users', 'users.id', '=', 'r.user_id')
        ->where('users.tipo_user', '=', 1);

        $nota_crit = 0;
        $crit_cont = 0;
        foreach($resenhas_criticos as $resenha)
        {
            $nota_crit += $resenha->nota;
            $crit_cont++;
        }

        $nota_pub = 0;
        $pub_cont = 0;
        foreach($resenha_publico as $resenha)
        {
            $nota_pub += $resenha->nota;
            $pub_cont++;
        }

        $media_nota_c = $nota_crit/$crit_cont;
        $media_nota_p = $nota_pub/$pub_cont;

        return view('publicacao', [
            'pub' => $pub,
            'resenhas_c' => $resenhas_criticos,
            'resenha_p' => $resenha_publico,
            'media_p' => $media_nota_p,
            'media_c' => $media_nota_c,
            'res_qnt_c' => $crit_cont,
            'res_qnt_p' => $pub_cont
        ]);
    }

}


