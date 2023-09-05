<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::get('/indicacao', 'IndicacaoController@indicacao');

Route::post('/indicacao', 'IndicacaoController@salvar');

Route::put('/indicacao', 'IndicacaoController@status');

Route::get('/showindicacao/{id}', 'IndicacaoController@showindicacao');

Route::get('/showindicacaostatus/{id}', 'IndicacaoController@showindicacaostatus');
*/