<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    // public $buscar = 'hola';
    public $buscar;
    

    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->buscar . '%')->get();

        return view('livewire.show-users', compact('usuarios'));
    }
}
