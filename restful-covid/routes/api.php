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

//membuat method get route /pasiens
Route::get('/pasiens', [PasienController::class, 'index']);

//membuat method get route /pasiens/id
Route::get('/pasiens/{id}', [PasienController::class, 'show']);

Route::get('/pasiens/status/{status}', [PasienController::class, 'getStatus']);

Route::get('/pasiens/search/{name}', [PasienController::class, 'getName']);

//membuat method post
Route::post('/pasiens', [PasienController::class, 'store']);

//membuat method put
Route::put('/pasiens/{id}', [PasienController::class, 'update']);

//membuat method delete
Route::delete('/pasiens/{id}', [PasienController::class, 'destroy']);