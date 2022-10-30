<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\VendaController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'index'])->name('caixa');
    Route::get('/deletar/{produtoId}', [CaixaController::class, 'destroy'])->name('remover');
    Route::post('/venda/salvar', [VendaController::class, 'store'])->name('salvar');
});
