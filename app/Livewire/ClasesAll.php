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
    public $open = false;

    public $Titulo, $Materia, $Seccion, $Color;

    use WithPagination;

    #[On('render')]

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
            'user_id' => $user->id,
        ]);

        $this->reset(['open','Titulo','Materia','Seccion','Color']);

        $this->dispatch('render');
        
    }

}
