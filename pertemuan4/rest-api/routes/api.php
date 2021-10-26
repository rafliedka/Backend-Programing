<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
#import animal controller
use App\Http\Controllers\AnimalController;
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

#endpoint animals
Route::GET('/animals', [AnimalController::class, "index"]);

#endpoint animals
Route::POST('/animals', [AnimalController::class, "store"]);

#endpoint animals
Route::PUT('/animals/{id}', [AnimalController::class, "update"]);

#endpoint animals
Route::DELETE('/animals/{id}', [AnimalController::class, "destroy"]);