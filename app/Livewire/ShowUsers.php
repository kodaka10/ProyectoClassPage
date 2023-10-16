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
    
    public $openE = false;
    public $usuarioEditId = '';

    public $usuarioEdit = ['name' => '', 'lastname' => '','email'=> ''];

   #[On('render')]

    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->buscar . '%')
                            ->orwhere('lastname','like', '%' . $this->buscar . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-users', compact('usuarios'));
    }


    public function edit($usuarioId)
    {
        $this->resetValidation();
        $this->openE = true;

        $this->usuarioEditId = $usuarioId;

        $user = User::find($usuarioId);
        $this->usuarioEdit['name'] = $user->name;
        $this->usuarioEdit['lastname'] = $user->lastname;
        $this->usuarioEdit['email'] = $user->email;
    }

    public function saveE()
    {
        $this->validate([
            'usuarioEdit.name' => 'required|max:50',
            'usuarioEdit.lastname' => 'required|max:50'
        ]);

        $user = User::find($this->usuarioEditId);
        $user->update([
            'name' => $this->usuarioEdit['name'],
            'lastname' => $this->usuarioEdit['lastname']
        ]);

        $this->reset(['usuarioEditId','usuarioEdit','openE']);

        // $this->user = User::all();
    }

    public function destroy($usuarioId)
    {
        $user = User::find($usuarioId);
        $user->delete();
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
