<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ClaseController;
use App\Livewire\ShowUsers;
use App\Livewire\ClasesAll;


Route::get('/', function () {
    return view('welcome');
})->name('home');

//-----------------Usuarios-----------------

Route::get('/logout',[SitioController::class, 'logout'])->name('logout');

Route::post('validar-usuario',[SitioController::class, 'login']);
Route::post('/registrar-usuario',[SitioController::class,'registerValitationForm']);
// Route::get('/consulta',[SitioController::class,'ConsultaUser'])->name('consulta');
Route::get('/usuariosC/{usuarios}',[SitioController::class,'ShowUsers'])->name('usuariosC');
Route::get('/editUser/{usuarios}',[SitioController::class,'editUserForm'])->name('editUser');
Route::patch('/updateUser/{usuarios}',[SitioController::class,'updateUserSave'])->name('updateUser');
Route::delete('/deleteUser/{usuarios}',[SitioController::class,'deleteUserSave'])->name('deleteUser');


//-----------------Clases-----------------

Route::get('/tareaTemporal',[ClaseController::class,'vistaTarea'])->name('tareaTemporal');
Route::get('/crearClase',[ClaseController::class,'crearClaseForm'])->name('crearClase');
// Route::post('/crear-clase',[ClaseController::class,'crearClaseSave'])->name('crear-clase');
Route::get('/mostrar-clases',[ClaseController::class,'mostrarClases'])->name('mostrar-clases');


// Route::get('/consulta',[ShowUsers::class,'render'])->name('consulta');

// Route::get('/consulta', ShowUsers::class)->name('consulta');

// Route::get('/consulta', ShowUsers::class)->name('consulta')->middleware('auth');

// Route::get('/vistaPrueba', [SitioController::class,'vistaDePrueba'])->name('vistaPrueba');

Route::get('/misclases/clase-detail/{titulo}-{id}',[ClaseController::class,'showClaseDetail'])->name('clase-detail');
Route::get('/misclases/all',[ClaseController::class,'mostrarMisClases'])->name('all');

Route::middleware('auth')->group(function()
{
    Route::get('/consulta', ShowUsers::class)->name('consulta');
}
);

Route::middleware('guest')->group(function()
{
    Route::get('/login',[SitioController::class, 'loginForm'])->name('login');
    Route::get('/register',[SitioController::class, 'registerForm'])->name('register');
}
);


Route::get('/Clases', ClasesAll::class)->name('Clases');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
