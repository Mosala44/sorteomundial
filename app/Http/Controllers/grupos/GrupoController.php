<?php

namespace App\Http\Controllers\Grupos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function Creargruposvacios($sorteoId){
        for ($i = 0; $i < 16; $i++) {
            Grupo::create([
                'sorteo_id' => $sorteoId,
                'bombo1_id' => null,
                'bombo2_id' => null,
                'bombo3_id' => null,
                'bombo4_id' => null,
            ]);
        }

        return response()->json(['message' => 'Grupos creados vacíos.']);
    }

    };

