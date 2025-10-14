<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function show(Request $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first(); //o first pega o primeiro registro

        if (!$sensor) { //mesma coisa que sensor == false
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        return response()->json([
            'success' => 'Sensor encontrado com sucesso',
            'status' => $sensor->status
        ], 200); //se gravar o registro é 201, porém estamos apenas recebendo, então é 200
    }

    public function update(Request $request){
         $sensor = Sensor::where('codigo', $request->codigo)->first(); //o first pega o primeiro registro

        if (!$sensor) { //mesma coisa que sensor == false
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        $sensor->status = !$sensor->status;
        $sensor->save();

        return response()->json([
            'success' => 'Sensor encontrado com sucesso',
            'status' => $sensor->status
        ], 200); //se gravar o registro é 201, porém estamos apenas recebendo, então é 200
    }

}
