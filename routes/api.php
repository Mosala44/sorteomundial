<?php

use App\Http\Controllers\apis\Bombo1Controller;
use App\Http\Controllers\apis\Bombo2Controller;
use App\Http\Controllers\apis\Bombo3Controller;
use App\Http\Controllers\apis\Bombo4Controller;
use App\Http\Controllers\sorteo\SorteoController;
use App\Http\Controllers\Grupos\GrupoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//RUTA DE API PARA LOS BOMBOS E INGRESO DE PAISES
Route::apiResource('bombo1', Bombo1Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo2', Bombo2Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo3', Bombo3Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo4', Bombo4Controller::class)->except(['create', 'edit']);

//RUTA DE API PARA LOS SORTEOS
Route::post('/sorteo/crear', [SorteoController::class, 'crearsorteo']);
Route::post('/sorteo/sortear', [SorteoController::class, 'sortear']);
Route::get('/sorteo/obtener', [SorteoController::class, 'obtenersorteo']);
//RUTA DE API PARA LOS GRUPOS
Route::post('/grupos/crear', [GrupoController::class, 'Creargruposvacios']);

