<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;

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

//Route::get('/', [VendaController::class, 'index'])->name('index');

//  Venda
Route::prefix('venda')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('user.list.all');
    Route::get('/listar/{vendaId}', [VendaController::class, 'show'])->name('user.list.details');
    Route::get('/buscar/{cpf}', [VendaController::class, 'search'])->name('user.list.search');
    Route::put('/editar/{usuarioId}', [VendaController::class, 'update'])->name('user.edit');
    Route::post('/salvar', [VendaController::class, 'store'])->name('user.save');
    Route::delete('/remover/{usuarioId}', [VendaController::class, 'destroy'])->name('user.remove');
});
