<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bombo4;
use Illuminate\Support\Facades\Validator;   

class bombo4controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paises = bombo4::all();
        $data = ['paises' => $paises, 'status' => 200];
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
        //
        if (bombo4::count() >= 16) {
            return response()->json([
                'message' => 'No se pueden agregar más de 16 países',
                'status' => 400
            ], 400);
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'ranking' => 'required',
            'confederacion' => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
            
        $paises = bombo4::create([
            'nombre' => $request->nombre,
            'ranking' => $request->ranking,
            'confederacion'=> $request->confederacion,
        ]);
        return response()->json([
            'message' => 'Pais creado correctamente',
            'data' => $paises,
            'status' => 201
        ], 201);
    }}

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
