<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

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

//membuat route request get dengan endpoint /pasiens
Route::get('/pasiens', [PasienController::class, 'index']);

//membuat route request get dengan endpoint /pasiens/id
Route::get('/pasiens/{id}', [PasienController::class, 'show']);

//membuat route request get dengan endpoint /pasiens/status/status
Route::get('/pasiens/status/{status}', [PasienController::class, 'getStatus']);

//membuat route request get dengan endpoint /pasiens/search/nama
Route::get('/pasiens/search/{name}', [PasienController::class, 'getName']);

//membuat route request post dengan endpoint /pasiens
Route::post('/pasiens', [PasienController::class, 'store']);

//membuat route request put dengan endpoint /pasiens/id
Route::put('/pasiens/{id}', [PasienController::class, 'update']);

//membuat route request delete dengan endpoint /pasiens/id
Route::delete('/pasiens/{id}', [PasienController::class, 'destroy']);