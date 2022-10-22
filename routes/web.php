<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ProdutoController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'index'])->name('caixa');
    Route::get('/{codigo_barra}', [CaixaController::class, 'index'])->name('itens.listar');
});
