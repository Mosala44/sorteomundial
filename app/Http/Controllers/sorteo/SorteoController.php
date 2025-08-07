<?php

namespace App\Http\Controllers\sorteo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sorteo;  // IMPORTANTE: importar modelo Sorteo
use App\Models\Bombo1;
use App\Models\Bombo2;
use App\Models\Bombo3;
use App\Models\Bombo4;
use App\Models\Grupo;

class SorteoController extends Controller
{
    public function crearsorteo(Request $request)
    {
        // Validar datos mínimos para crear sorteo (opcional, pero recomendado)
        $request->validate([
            'nombre' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $sorteo = Sorteo::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            // No se necesita 'sorteo_id' aquí
        ]);

        if (!$sorteo) {
            return response()->json([
                'message' => 'Error al crear el sorteo',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Sorteo creado correctamente',
            'data' => $sorteo,
            'status' => 201
        ], 201);
    }

    public function sortear(Request $request)
    {
        // Validar que se envíe el id del sorteo al que se asignarán los grupos
        $request->validate([
            'sorteo_id' => 'required|exists:sorteos,id',
        ]);

        $sorteo_id = $request->sorteo_id;

        // Obtener los bombos y convertir a array para usar shuffle de PHP
        $bombo4 = Bombo4::all()->shuffle();
        $bombo1 = Bombo1::all()->shuffle();
        $bombo2 = Bombo2::all()->shuffle();
        $bombo3 = Bombo3::all()->shuffle();

        // Verificar que cada bombo tenga al menos 8 países
        $grupos = [];

        for ($i = 0; $i < 16; $i++) {
            $grupo = Grupo::create([
                'bombo1_id' => $bombo1[$i]['id'],
                'bombo2_id' => $bombo2[$i]['id'],
                'bombo3_id' => $bombo3[$i]['id'],
                'bombo4_id' => $bombo4[$i]['id'],
                'sorteo_id' => $sorteo_id,
            ]);

            $grupos[] = $grupo;
        }

        return response()->json($grupos);
    }

    public function obtenersorteo(Request $request)
    {
        // Validar que se envíe el id del sorteo a obtener
        $request->validate([
            'sorteo_id' => 'required|exists:sorteos,id',
        ]);

        $sorteo_id = $request->sorteo_id;

        // Obtener el sorteo por su ID
        $sorteo = Sorteo::find($sorteo_id);

        if (!$sorteo) {
            return response()->json([
                'message' => 'Sorteo no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'data' => $sorteo,
            'status' => 200
        ], 200);
    }
}
