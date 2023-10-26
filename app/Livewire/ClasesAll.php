<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Clase;
use App\Models\UserInClase;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ClasesAll extends Component
{
    public $buscar = '';
    public $open = false, $openJ = false;

    public $Titulo, $Materia, $Seccion, $Color, $Join;
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

    // public function render()
    // {
    //     $clases = Clase::whereNotIn('id', function ($query) {
    //         $query->select('clase_id')
    //             ->from('usersclases')
    //             ->where('user_id', auth()->user()->id);
    //     });
    
    //     if ($this->buscar) {
    //         $clases->where(function ($query) {
    //             $query->where('titulo', 'like', '%' . $this->buscar . '%')
    //                 ->orWhereHas('user', function ($subQuery) {
    //                     $subQuery->where('name', 'like', '%' . $this->buscar . '%')
    //                         ->orWhere('lastname', 'like', '%' . $this->buscar . '%');
    //                 });
    //         });
    //     }
    
    //     $clases = $clases->orderBy('created_at', 'asc')
    //                     ->paginate(10);
    
    //     return view('livewire.clases-all', compact('clases'));
    // }

    public function render()
    {

        //Busqueda para las clases las cual el usuario no se ha unido
        $clases = Clase::whereNotIn('id', function ($query) {
            $query->select('clase_id')
                ->from('usersclases')
                ->where('user_id', auth()->user()->id);
        });

        //si buscamos algo entonces sera por titulo/nombre/lastname
        if ($this->buscar) {
            $clases->where(function ($query) {
                $query->where('titulo', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('user', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->buscar . '%')
                            ->orWhere('lastname', 'like', '%' . $this->buscar . '%');
                    });
            });
        }
        //quitamos las clases las cual el usuario creo
        $clases->where('user_id', '!=', auth()->user()->id);

        $clases = $clases->orderBy('created_at', 'desc')
                        ->paginate(9);

        return view('livewire.clases-all', compact('clases'));
    }

    

    // public function render()
    // {
    //     $clases = Clase::where('titulo', 'like', '%' . $this->buscar . '%')
    //     ->orWhereHas('user', function ($query) {
    //         $query->where('name', 'like', '%' . $this->buscar . '%')
    //             ->orWhere('lastname', 'like', '%' . $this->buscar . '%');
    //     })
    //     ->orderBy('created_at', 'asc')
    //     ->paginate(10);

    //     return view('livewire.clases-all', compact('clases'));
    // }

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
        $this->dispatch('alertaC');        
    }

    public function JoinId($claseId)
    {
        $this->IdClase = $claseId;
        
        $this->openJ = true;
    }

    public function JoinClase()
    {
        $clase = Clase::find($this->IdClase);

        if($clase && $clase->codigo === $this->Join)
        {
            UserInClase::create([
                'user_id' => Auth::user()->id,
                'clase_id' => $this->IdClase
            ]);

            $this->reset(['IdClase','openJ','Join']);
        }
        else
        {
            $this->addError('Join', 'El codigo de la clase no es valido');
        }

    }

    // public function userHasJoinedClass($userId, $claseId)
    // {
    //     return UserInClase::where('user_id', $userId)
    //         ->where('clase_id', $claseId)
    //         ->exists();
    // }


}
