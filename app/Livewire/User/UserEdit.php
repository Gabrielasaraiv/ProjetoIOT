<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
     public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'max:80|min:5',
        'email' => 'email',
        
    ];

    protected $messages = [
       
        'name.max' => 'O máximo de caracteres são 80.',
        'name.min' => 'O máximo de caracteres são 5.',
        
        'email.email' => 'Forma de email incorreta.',
        
        
    ];
    public function mount($id){
    
        $this->userId = $id;
        $user = User::find($this->userId);

        if($user){
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function update()
    {
        $this->validate();

        $user = User::find($this->userId);

        if($this->password != null) {
           $user->password = Hash::make($this->password);
        } //deixa a senha antiga caso não digite nada


        $user->name = $this->name;
        $user->email = $this->email;
    
        $user->save();
        session()->regenerate();
        return redirect()->route('perfil');
        session()->flash('success', 'Editado');
    }

    public function render()
    {
        return view('livewire.user.user-edit');
    }
}
