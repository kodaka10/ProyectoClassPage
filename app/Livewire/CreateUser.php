<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class CreateUser extends Component
{

    public $open = false;
    public $name, $lastname, $email;

    //temporal
    public $password ="12345678";

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = [
        'name' => 'required|max:50',
        'lastname' => 'required|max:50',
        'email' => 'required|email|unique:users,email'];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' =>  Hash::make($this-> password)
        ]);

        $this->reset(['open','name','lastname','email']);

        $this->dispatch('render');

        // $this->dispatch('alert');

    }

    public function updatingOpen()
    {
        if($this->open==false)
        {
            $this->reset(['name','lastname','email']);
        }
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
