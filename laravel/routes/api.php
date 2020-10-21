<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('teste', [TesteController::class, 'index']);
Route::get('teste/create', [TesteController::class, 'create']);
Route::get('teste/{id}/edit', [TesteController::class, 'edit']);
Route::post('teste', [TesteController::class, 'store']);
Route::put('teste/{id}', [TesteController::class, 'update']);
Route::delete('teste/{id}', [TesteController::class, 'destroy']);
Route::put('teste/{id}/restore', [TesteController::class, 'restore']);