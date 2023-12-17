<?php

namespace App\Http\Controllers;

use App\Models\Resenha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenhaController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nota' => 'required|min:0|max:10|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'resenha' => 'required|string|min:10',
        ]);

        Resenha::create([
            'user_id' => Auth::user()->id,
            'publi_id' => $request->post('pub'),
            'descricao' => $request->post('resenha'),
            'nota' => $request->post('nota')
        ]);

        return redirect()->back();
    }
}
