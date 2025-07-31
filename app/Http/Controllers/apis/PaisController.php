<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Pais;
class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::all();
        $data = [
            'paises' => $paises,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'nombre' => 'required',
        'ranking' => 'required',
        'confederacion' => 'required',
    ]);

    if ($validator->fails()) {
        $data = [
            'message' => 'Error en la validación de datos',
            'errors'  => $validator->errors(),
            'status'  => 400
        ];

        return response()->json($data, 400);
    }

    $paises = Pais::create([
        'nombre'=> $request->nombre,
        'ranking'=> $request->ranking,
        'confederacion'=> $request->confederacion,
    ]);

    return response()->json([
        'message' => 'Pais creado correctamente',
        'data'    => $paises,
        'status'  => 201
    ], 201);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
