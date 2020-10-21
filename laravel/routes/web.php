<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CifraController;
use App\Http\Controllers\AuthenticateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('cifras');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('cifras', [CifraController::class, 'index']);
    Route::get('minhas-cifras', [CifraController::class, 'minhas_cifras']);

    Route::get('cifras/cadastrar', [CifraController::class, 'cadastrar']);
    Route::post('cifras', [CifraController::class, 'salvar']);

    Route::get('cifras/{id}/edit', [CifraController::class, 'editar']);
    Route::put('cifras/{id}', [CifraController::class, 'atualizar']);

    Route::delete('cifras/{id}', [CifraController::class, 'remover']);

    Route::get('cifras/{id}', [CifraController::class, 'show']);
});

Route::get('login', [AuthenticateController::class, 'index'])->name("login");
Route::post('login', [AuthenticateController::class, 'authenticate']);

Route::get('cadastrar', [AuthenticateController::class, 'cadastrar']);
Route::post('cadastrar', [AuthenticateController::class, 'store']);

Route::get('logout', [AuthenticateController::class, 'logout']);
