<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
   public function vistaClases()
   {
        return view('clases');
   }

   public function crearCLaseForm()
   
   {
     return view('crearClase');
   }

   public function crearClaseSave(Request $request)
   {
    $request -> validate(['titulo' => 'required|max:30',
    'materia' => 'required|max:40',
    'seccion' => 'required|max:10']);
    
    $clase = new Clase();
    $clase->titulo = $request->titulo;
    $clase->materia = $request->materia;
    $clase->seccion =  $request->seccion;
    $clase->nombre = Auth::user()->name;
    $clase->apellido = Auth::user()->lastname;
    $clase->user_id = Auth::user()->id;
    $clase->save();

    return redirect()->route('home');
   }


}
