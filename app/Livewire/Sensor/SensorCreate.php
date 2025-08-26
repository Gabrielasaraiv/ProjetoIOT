<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{
     public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;


    protected $rules = [
        'codigo' => 'max:100|min:2|unique:sensors,codigo',
        'tipo' => 'required',
        'descricao' => 'max:150|min:2',
        'status' => 'required',
        
    ];

    protected $messages = [
        'codigo.max' => ' O máximo de caracteres são 100.',
        'codigo.min' => 'O mínimo de caracteres são 2',
        'codigo.unique' => 'Este código já está cadastrado.',
        'tipo.required' => 'O tipo de sensor é obrigatório.',
        'descricao.max' => 'O máximo de caracteres são 150',
        'descricao.min' => 'O mínimo de caracteres são 2.',
        'status.required' => 'O status do sensor é obrigatório.' 
    ];


    public function store()
    {

        $this->validate();

        $ambientes = Ambiente::all();

        $sensor = Sensor::create([
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status,
            'ambiente_id' => 
        ]);

        session()->flash('message', 'Cadastro realizado!');
        
    }


    public function render()
    {
        return view('livewire.sensor.sensor-create');
    }
}
