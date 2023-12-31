<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ResenhaController;
use App\Models\Publicacao;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/users', function () {
    return view('users.index');
});
Route::get('/admin', [UserController::class, 'indexAdmin']);

Route::get('/login', function () {
    return view('register.login');
})->name('login'); ;

Route::post('/login', [UserController::class, 'index']);

Route::get('/register', function () {
    return view('register.register');
})->name('register'); 
Route::post('/register', [UserController::class, 'store']);

Route::get('/registerAdmin', function () {
    return view('cadastro.register');
});

Route::get('/create/publicacao', [PublicacaoController::class, 'create'])->name('createPubli');

Route::post('/create/publicacao', [PublicacaoController::class, 'store']);

Route::get('/publicacao/{id}', [PublicacaoController::class, 'show']);

Route::get('/registerUser', function () {
    return view('register.registerUser');
})->name('registerUser');

Route::post('/registerUser', [UserController::class, 'storeUser']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/user/{id}', [UserController::class, 'edit']);

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.updt');

Route::post('/store/resenha', [ResenhaController::class, 'store']);

Route::get('/teste', function (){
    return view('single-post');
});

