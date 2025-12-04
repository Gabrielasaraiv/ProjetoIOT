<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|max:80|min:5',
        'email' => 'required|email',
        'password' => 'required|min:5'
    ];

    protected $messages = [
        'name.required' => 'O campo é obrigatório.',
        'name.max' => 'O máximo de caracteres são 80.',
        'name.min' => 'O máximo de caracteres são 5.',
        'email.required' => 'O campo é obrigatório.',
        'email.email' => 'Forma de email incorreta.',
        'password.required' => 'O campo é obrigatório.',
        'password.min' => 'O máximo de caracteres são 5.',
    ];


    public function store(){
        $this->validate();

        User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=>Hash::make($this->password)
        ]);

        session()->flash('success', 'Usuário Cadastrado.');
        

    }

    public function render()
    {
        return view('livewire.user.user-create');
    }
}
