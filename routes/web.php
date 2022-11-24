<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovimentaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\VendaController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::post('/sair', [LoginController::class, 'logout'])->name('sair');

//Route::middleware(['auth'])->group(function () {

    Route::prefix('caixa')->group(function () {
        Route::get('/', [CaixaController::class, 'caixa'])->name('caixa');
        Route::post('/buscar', [CaixaController::class, 'adicionarItem'])->name('buscar');
        Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('venda');
        Route::delete('/deletar/{produtoId}', [CaixaController::class, 'removerItem'])->name('remover');
        Route::post('/movimentar/abrirCaixa', [MovimentaController::class, 'abrirCaixa'])->name('abrirCaixa');
        Route::put('/movimentar/fecharCaixa', [MovimentaController::class, 'fecharCaixa'])->name('fecharCaixa');
    });

    Route::post('venda/pagar', [PagamentoController::class, 'criarPagamento'])->name('pagamento');
//});
