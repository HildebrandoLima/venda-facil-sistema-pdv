<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovimentaController;
use App\Http\Controllers\NFeController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\VendaController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::get('/sair', [LoginController::class, 'logout'])->name('sair');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'caixa'])->name('caixa');
    Route::post('/buscar', [CaixaController::class, 'adicionarItem'])->name('buscar');
    Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('venda');
    Route::post('/movimentar/abrirCaixa', [MovimentaController::class, 'abrirCaixa'])->name('abrir');
    Route::put('/movimentar/fecharCaixa', [MovimentaController::class, 'fecharCaixa'])->name('fechar');
});

Route::prefix('item')->group(function () {
    Route::get('/deletar/{itemId}', [ItemController::class, 'removerItem'])->name('remover');
});

Route::prefix('pagamento')->group(function () {
    Route::get('/', [PagamentoController::class, 'pagamento'])->name('pagamento');
    Route::post('venda/pagar', [PagamentoController::class, 'criarPagamento'])->name('salvarpagamento');
});

Route::prefix('nfe')->group(function () {
    Route::get('/', [NFeController::class, 'criarNFe'])->name('nfe');
    Route::get('/{vendaId}', [NFeController::class, 'gerarNFe'])->name('gerarnfe');
});
