<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Tareas;
use Illuminate\Support\Facades\Auth;

class ClaseAnuncio extends Component
{
    use WithFileUploads; 

    public $formularioVisible  = false;
    public $mostrarBoton = true;
    public $titulo = '';
    public $informacion = '';
    public $tipo = '';
    public $archivo;
    public $fecha_vencimiento;

    public $clase; // instancia de la clase tomada de clase-detail
    public $usuario;
    public $anuncio;

    // public $anuncioClase;

    #[On('render')]


    public function render()
    {
        $usuario = Auth::user();
    
        $anunciosClase = Tareas::where('creador_anuncio', $usuario->id)
                               ->where('id_fromClase', $this->clase->id)
                               ->get();
    
        return view('livewire.clase-anuncio', compact('anunciosClase'));
    }
    
    public function mount()
    {
        $this->formularioVisible  = false;
        $this->mostrarBoton = true;
        $this->titulo = '';
        $this->informacion = '';
        $this->tipo = '';
        $this->archivo = null;
    }

    protected $rules = [
        'titulo' => 'required|max:50',
        'informacion' => 'required|string',
        'tipo' => 'required|in:anuncio,tarea',
        'archivo' => 'required|nullable|file|mimes:pdf,doc,docx|max:4096', 
        'fecha_vencimiento' => 'nullable|date|required',
    ];
    public function mostrarFormulario()
    {
        $this->formularioVisible  = true;
        $this->mostrarBoton = false;
    }

    public function ocultarFormulario()
    {
        $this->formularioVisible  = false;
        $this->mostrarBoton = true;
    }

    public function crearAnuncio($idClase)
    {
        $this->validate();
        $usuario = Auth::user();

        $archivoURL = null;
        if ($this->archivo) {
            $archivoURL = $this->archivo->storeAs('archivos_anuncios', uniqid() . '_' . $this->archivo->getClientOriginalName(), 'public');
        }

        $fechaPublicacion = now();

        $anuncio = Tareas::create([
            'titulo' => $this->titulo,
            'informacion' => $this->informacion,
            'tipo' => $this->tipo,
            'archivo' => 'public/' . $archivoURL,
            'nombre_original' => $this->archivo->getClientOriginalName(),
            'fecha_publicacion' => $fechaPublicacion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'id_fromClase' =>  $idClase,
            'creador_anuncio' => $usuario->id,

        ]);
        $this->dispatch('render');
        $this->reset(['titulo','informacion','tipo','archivo','fecha_vencimiento',]);
        $this->ocultarFormulario();
        $this->dispatch('alertaC');    
    }

    public function cancelar()
    {
        $this->titulo = '';
        $this->informacion = '';
        $this->tipo = '';
        $this->archivo = null;
    
        $this->ocultarFormulario();
    }


}
