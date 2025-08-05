<?php

use App\Http\Controllers\apis\Bombo1Controller;
use App\Http\Controllers\apis\Bombo2Controller;
use App\Http\Controllers\apis\Bombo3Controller;
use App\Http\Controllers\apis\Bombo4Controller;

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

Route::apiResource('bombo1', Bombo1Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo2', Bombo2Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo3', Bombo3Controller::class)->except(['create', 'edit']);
Route::apiResource('bombo4', Bombo4Controller::class)->except(['create', 'edit']);

