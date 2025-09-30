<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;
use Livewire\WithPagination;

class AmbienteList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    public $ambienteId;



    public function abrirModalExclusao($ambienteId)
    {
        $this->ambienteId = $ambienteId;
    }

    public function delete()
    {
        if ($this->ambienteId) {
            $ambiente =  Ambiente::find($this->ambienteId);
            $ambiente->delete(); // deleto o funcionario
        }
    }
    public function render()
    {
        $ambientes = Ambiente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('descricao', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
           
            ->paginate($this->perPage);


        return view('livewire.ambiente.ambiente-list', compact('ambientes'));
    }

}
