<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

class ShowUsers extends Component
{
    // public $buscar = 'hola';
    public $buscar;
    public $sort = 'id';
    public $direction = 'desc';
    

   #[On('render')]

    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->buscar . '%')
                            ->orwhere('lastname','like', '%' . $this->buscar . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-users', compact('usuarios'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if($this->direction == 'desc')
            {
                $this->direction = 'asc';
            }
            else {
                $this->direction = 'desc';
            }

        }else
        {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        


    }

}
