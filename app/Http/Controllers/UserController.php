<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

                return redirect("/admin");

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
        $tp_user = 1;
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'password' => bcrypt($password),
            'tipo_user' => $tp_user, 
        ]);
        return redirect("/users");



    }
    public function storeUser(Request $request)
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



    }
}
