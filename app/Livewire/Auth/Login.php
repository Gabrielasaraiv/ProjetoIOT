<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{ 
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|min:5|email',
        'password' => 'required|min:5'
    ];

    protected $messages = [
        'email.required' => 'O email é obrigatório.',
        'email.min' => 'O email deve ter no mínimo 5 caracteres.',
        'email.email' => 'O formato do email não é válido.',
        'password.required' => 'A senha é obrigatória.',
        'password.min' => 'A senha deve ter no mínimo 5 caracteres.'
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }
        session()->flash('error', 'Email ou senha incorretos.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
