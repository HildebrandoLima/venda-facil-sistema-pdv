<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ProdutoController;


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

Route::get('/caixa', [CaixaController::class, 'index'])->name('caixa');
Route::get('/caixa/{codigo_barra}', [CaixaController::class, 'index'])->name('itens.listar');

//  Item
Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('item.listar');
});

//  Venda
Route::prefix('venda')->group(function () {
    //Route::get('/', [VendaController::class, 'index'])->name('venda.listar.todos');
    //Route::get('/listar/{vendaId}', [VendaController::class, 'show'])->name('user.list.details');
    //Route::get('/buscar/{cpf}', [VendaController::class, 'search'])->name('user.list.search');
    //Route::put('/editar/{usuarioId}', [VendaController::class, 'update'])->name('user.edit');
    Route::post('/salvar', [VendaController::class, 'store'])->name('venda.salvar');
    //Route::delete('/remover/{usuarioId}', [VendaController::class, 'destroy'])->name('user.remove');
});
