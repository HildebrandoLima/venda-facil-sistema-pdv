<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\VendaController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

//Route::match(['get', 'post'], 'caixa/', [CaixaController::class, 'caixa'])->name('caixa');
//Route::match(['get', 'post'], 'caixa/venda/salvar', [VendaController::class, 'criarVenda'])->name('venda');
//Route::match(['get', 'post'], 'caixa/adicionar', [CaixaController::class, 'adicionarItem'])->name('adicionar');
//Route::match(['get', 'post'], 'caixa/deletar/{produtoId}', [CaixaController::class, 'removerItem'])->name('remover');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'caixa'])->name('caixa');
    Route::post('/buscar', [CaixaController::class, 'adicionarItem'])->name('buscar');
    //oute::post('/adicionar', [CaixaController::class, 'adicionarItem'])->name('adicionar');
    Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('venda');
    Route::delete('/deletar/{produtoId}', [CaixaController::class, 'removerItem'])->name('remover');
});
