<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\UserInClase;
use Livewire\WithPagination;

class ClaseController extends Controller
{
  use WithPagination;

   public function vistaTarea()
   {
        return view('tareaTemporal');
   }

   /*
   public function crearCLaseForm()
   
   {
     return view('crearClase');
   }

   */

   /*
   public function crearClaseSave(Request $request)
   {
    $request -> validate(['titulo' => 'required|max:30',
    'materia' => 'required|max:40',
    'seccion' => 'required|max:10',
    'color' => 'required' 
      ]);

    $clase = new Clase();
    $clase->titulo = $request->titulo;
    $clase->materia = $request->materia;
    $clase->seccion =  $request->seccion;
    $clase->color = $request->color;
    // $clase->nombre = Auth::user()->name;
    // $clase->apellido = Auth::user()->lastname;
    $clase->user_id = Auth::user()->id;

   //  $user = User::find($request->user_id);
   //  $user->Clase()->save($clase);
    $clase->save();
    
    return redirect()->route('home');
   }
   */

   public function mostrarClases(Clase $clases)
   {
      return view('mostrar-clases', compact('clases'));
   }

   public function showClaseDetail($titulo, $id)
   {
    $titulo = str_replace(' ', '_', $titulo);

      $clase = Clase::find($id);
      
      if (!$clase) {
          abort(404); 
      }
      return view('misclases.clase-detail', compact('clase', 'titulo'));
   }

   public function mostrarMisClases()
   {
      $userId = Auth::user()->id;
      $clasesUnidas = UserInClase::where('user_id', $userId)->pluck('clase_id')->all();
      $clasesCreadas = Clase::where('user_id', $userId)->pluck('id')->all();
      $misClasesIds = array_merge($clasesUnidas, $clasesCreadas);
      $misClases = Clase::whereIn('id', $misClasesIds)->paginate(9);

      return view('misclases.all', compact('misClases'));
   }

}
