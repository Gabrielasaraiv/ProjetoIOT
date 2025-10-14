<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class ListStatus extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    public $sensorId;

    //método para alternar o status
    public function toggleStatus($sensorId)
    {
        $sensor = Sensor::find($sensorId);
        if ($sensor) {
            // Inverte o status: 1 vira 0, e 0 vira 1.
            $sensor->status = $sensor->status ? 0 : 1;
            $sensor->save();
        }
    }

    public function render()
    {
        $sensores = Sensor::where('codigo', 'like', "%{$this->search}%")
            ->orWhere('tipo', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")

            ->paginate($this->perPage);


        return view('livewire.sensor.list-status', compact('sensores'));
    }
}
