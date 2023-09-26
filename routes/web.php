<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;

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
    return view('welcome');
})->name('home');

Route::get('/login',[SitioController::class, 'loginForm'])->name('login');
Route::get('/register',[SitioController::class, 'registerForm'])->name('register');
Route::get('/logout',[SitioController::class, 'logout'])->name('logout');

Route::post('validar-usuario',[SitioController::class, 'login']);
Route::post('/registrar-usuario',[SitioController::class,'registerValitationForm']);
Route::get('/consulta',[SitioController::class,'ConsultaUser'])->name('consulta');
Route::get('/usuariosC/{usuarios}',[SitioController::class,'ShowUsers'])->name('usuariosC');