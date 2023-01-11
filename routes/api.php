<?php

use App\Http\Controllers\AcademiaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
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

Route::prefix('academia')->group(function () {
    Route::get('/', [AcademiaController::class,'encontraAcademias']);
    Route::post('/store', [AcademiaController::class, 'store']);
    Route::put('/{id}/update', [AcademiaController::class, 'update']);
    Route::delete('/{id}/delete', [AcademiaController::class, 'delete']);
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class,'index']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::post('/store', [UsuarioController::class,'store']);
    Route::put('/{id}/update', [UsuarioController::class,'update']);
    Route::delete('/{id}/delete', [UsuarioController::class,'delete']);
});

Route::prefix('contato')->group(function () {
    Route::get('/{id}', [ContatoController::class, 'index']);
    Route::post('/store', [ContatoController::class,'store']);
    Route::put('/{id}/update', [ContatoController::class,'update']);
    Route::delete('/{id}/delete', [ContatoController::class,'delete']);
});

Route::prefix('perfil')->group(function () {
    Route::get('/', [PerfilController::class,'index']);
    Route::get('/{id}', [PerfilController::class, 'show']);
    Route::post('/store', [PerfilController::class,'store']);
    Route::put('/{id}/update', [PerfilController::class,'update']);
    Route::delete('/{id}/delete', [PerfilController::class,'delete']);
});
