<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MovimentaController;
use App\Http\Controllers\PagamentoController;

//Route::get('/', [VendaController::class, 'index'])->name('index');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'caixa'])->name('caixa');
    Route::post('/buscar', [CaixaController::class, 'adicionarItem'])->name('buscar');
    Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('venda');
    Route::delete('/deletar/{produtoId}', [CaixaController::class, 'removerItem'])->name('remover');
    Route::post('/movimentar/abrirCaixa', [MovimentaController::class, 'abrirCaixa'])->name('abrir');
    Route::put('/movimentar/fecharCaixa', [MovimentaController::class, 'fecharCaixa'])->name('fechar');
});

Route::post('venda/pagar', [PagamentoController::class, 'criarPagamento'])->name('pagamento');
