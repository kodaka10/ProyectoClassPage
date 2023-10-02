<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ClaseController;

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

//-----------------Usuarios-----------------

Route::get('/login',[SitioController::class, 'loginForm'])->name('login');
Route::get('/register',[SitioController::class, 'registerForm'])->name('register');
Route::get('/logout',[SitioController::class, 'logout'])->name('logout');

Route::post('validar-usuario',[SitioController::class, 'login']);
Route::post('/registrar-usuario',[SitioController::class,'registerValitationForm']);
Route::get('/consulta',[SitioController::class,'ConsultaUser'])->name('consulta');
Route::get('/usuariosC/{usuarios}',[SitioController::class,'ShowUsers'])->name('usuariosC');
Route::get('/editUser/{usuarios}',[SitioController::class,'editUserForm'])->name('editUser');
Route::patch('/updateUser/{usuarios}',[SitioController::class,'updateUserSave'])->name('updateUser');
Route::delete('/deleteUser/{usuarios}',[SitioController::class,'deleteUserSave'])->name('deleteUser');


//-----------------Clases-----------------

Route::get('/clases',[ClaseController::class,'vistaClases'])->name('clases');
Route::get('/crearClase',[ClaseController::class,'crearClaseForm'])->name('crearClase');
Route::post('/crear-clase',[ClaseController::class,'crearClaseSave'])->name('crear-clase');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
