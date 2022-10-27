<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\VendaController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

Route::prefix('caixa')->group(function () {
    Route::get('/', [VendaController::class, 'status'])->name('caixa.status');
    Route::get('/', [CaixaController::class, 'home'])->name('caixa.visualizacao');
    Route::get('/', [CaixaController::class, 'index'])->name('caixa.item');

    //Route::get('/', [CheckoutController::class, 'viewCheckout'])->name('ver_itens');
    //Route::post('/{produto_id}/item/adicionar', [CheckoutController::class, 'addCheckout'])->name('adicionar_item');
});
