<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Publicacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userType = Auth::user()->tipo_user;
            
            if ($userType == 1 || $userType == 2) {

                return redirect("/users");

            } elseif ($userType == 3) {

                $filme = Publicacao::where('tipo_publi', 1)->latest()->first();
                $jogo = Publicacao::where('tipo_publi', 2)->latest()->first();
                $livro = Publicacao::where('tipo_publi', 3)->latest()->first();
            
                return view('users.indexAdmin', [
                    'filme' => $filme,
                    'jogo' => $jogo,
                    'livro' => $livro
                ]);

            }
        } else {

            return redirect("/login");
 
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'password' => 'required|min:8',
        ]);

        $name = $request->post('name');
        $email = $request->post('email');
        $date = Carbon::parse($request->input('date')); // manipular datas
        $password = $request->post('password');
        $tp_user = ($request->post('tipo_user') == null ? 1 : $request->post('tipo_user'));
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'password' => Hash::make($password),
            'tipo_user' => $tp_user, 
        ]);
        return redirect("/users");



    }
    /* public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'password' => 'required|min:8',
            'tipo_user' => 'required',
        ]);

        $name = $request->post('name');
        $email = $request->post('email');
        $date = Carbon::parse($request->input('date')); // manipular datas
        $password = $request->post('password');
        $tp_user = $request->post('tipo_user');
        
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'password' => bcrypt($password),
            'tipo_user' => $tp_user, 
        ]);
        return redirect("/admin");
    } */

    public function indexAdmin()
    {
        $this->authorize('adminHome', Auth::user());
        
        return view('users.indexAdmin');
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }

        return redirect('/');
    }

    public function edit($id)
    {
        $user = User::find($id);

        $this->authorize('update', $user);


        return view('users.edit', [
            'user' => $user,
        ]);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $date = Carbon::parse($request->input('date'));
        $password = $request->input('password');

        $user = [];
        if($password == null or $password == ""){
            $user = [
                'name' => $name,
                'email' => $email,
                'date' => $date,
            ];

        }else{
            $user = [
                'name' => $name,
                'email' => $email,
                'date' => $date,
                'password' => Hash::make($password),
            ];
        }

        User::find($id)->update($user);

        
        return redirect("/");
    }
}
