<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovimentaController;
use App\Http\Controllers\NFeController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendaController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::get('/sair', [LoginController::class, 'logout'])->name('sair');

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'caixa'])->name('view.caixa');
    Route::get('/fechar', [CaixaController::class, 'fechar'])->name('view.caixa.fechar');
    Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('salvar.venda');
    Route::post('/movimentar/abrirCaixa', [MovimentaController::class, 'abrirCaixa'])->name('abrir.caixa');
    Route::put('/movimentar/fecharCaixa', [MovimentaController::class, 'fecharCaixa'])->name('fechar.caixa');
});

Route::prefix('item')->group(function () {
    Route::get('/deletar/{itemId}', [ItemController::class, 'removerItem'])->name('remover.item');
    Route::put('/alterar/quantidade', [ItemController::class, 'alterarQuantidadeItem'])->name('alterar.quantidade.item');
    Route::post('/buscar', [ItemController::class, 'adicionarItem'])->name('buscar.adicionar.item');
});

Route::prefix('pagamento')->group(function () {
    Route::get('/', [PagamentoController::class, 'pagamento'])->name('view.pagamento');
    Route::post('venda/pagar', [PagamentoController::class, 'criarPagamento'])->name('salvar.pagamento');
});

Route::prefix('nfe')->group(function () {
    Route::get('/', [NFeController::class, 'criarNFe'])->name('salvar.nfe');
    Route::get('/{vendaId}', [NFeController::class, 'gerarNFe'])->name('gerar.nfe');
});

Route::prefix('cliente')->group(function () {
    Route::post('/identificar', [UsuarioController::class, 'identificarCliente'])->name('identificar.cliente');
});