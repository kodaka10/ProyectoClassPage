<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Clase;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ClasesAll extends Component
{
    public $buscar = '';
    public $open = false, $openJ = false;

    public $Titulo, $Materia, $Seccion, $Color;
    public $IdClase;

    use WithPagination;

    #[On('render')]

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function RandomNumber()
    {
        return mt_rand(10000, 99999);
    }

    protected $rules = [
        'Titulo' => 'required|max:50',
        'Materia' => 'required|max:50',
        'Seccion' => 'required|max:6',
        'Color' => 'required'];

    public function render()
    {
        $clases = Clase::where('titulo', 'like', '%' . $this->buscar . '%')
        ->orWhereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->buscar . '%')
                ->orWhere('lastname', 'like', '%' . $this->buscar . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('livewire.clases-all', compact('clases'));
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function crearClase()
    {
        $this->validate();
        
        $user = Auth::user();

        Clase::create([
            'titulo' => $this->Titulo,
            'materia' => $this->Materia,
            'seccion' => $this->Seccion,
            'color' => $this->Color,
            'codigo' => $this->RandomNumber(),
            'user_id' => $user->id,
        ]);

        $this->reset(['open','Titulo','Materia','Seccion','Color']);

        $this->dispatch('render');
        
    }

    public function JoinId($claseId)
    {
        $this->IdClase = $claseId;
        
        $this->openJ = true;
    }

    public function JoinClase()
    {
        $clase = Clase::find($this->IdClase);
        $this->reset(['IdClase','openJ']);
    }

}
