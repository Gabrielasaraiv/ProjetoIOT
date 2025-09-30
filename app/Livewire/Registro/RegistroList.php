<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    public $registroId;

    public function abrirModalExclusao($registroId)
    {
        $this->registroId = $registroId;
    }

    public function delete()
    {
        if ($this->registroId) {
            $registro =  Registro::find($this->registroId);
            $registro->delete();
        }
    }
    public function render()
    {
        $registros = Registro::orderBy('data_hora', 'desc')
            ->orwhere('sensor_id', 'like', "%{$this->search}%")
            ->orwhere('valor', 'like', "%{$this->search}%")
            ->orwhere('unidade', 'like', "%{$this->search}%")
            ->orwhere('data_hora', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.registro.registro-list', compact('registros'));
    }
}
