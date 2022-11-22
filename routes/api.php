<?php

use App\Http\Controllers\AcademiaController;
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
