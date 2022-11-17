<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MovimentaController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'index'])->name('caixa');
    Route::get('/deletar/{produtoId}', [CaixaController::class, 'destroy'])->name('remover');
    Route::post('/venda/salvar', [VendaController::class, 'store'])->name('salvar');
    Route::post('/movimentar/abrirCaixa', [MovimentaController::class, 'abrirCaixa'])->name('abrirCaixa');
    Route::put('/movimentar/fecharCaixa', [MovimentaController::class, 'fecharCaixa'])->name('fecharCaixa');

});


//dados-> $request-> all ();
