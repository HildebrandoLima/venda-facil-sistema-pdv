<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('operador')->group(function () {
    Route::get('/', [CaixaController::class, 'caixa'])->name('view.caixa');
    Route::get('/caixa/fechar', [CaixaController::class, 'fechar'])->name('view.caixa.fechar');

    Route::post('/venda/salvar', [VendaController::class, 'criarVenda'])->name('salvar.venda');

    Route::post('/movimento/abrir/caixa', [MovimentaController::class, 'abrirCaixa'])->name('abrir.caixa');
    Route::put('/movimento/fechar/caixa', [MovimentaController::class, 'fecharCaixa'])->name('fechar.caixa');

    Route::get('/item/deletar/{itemId}', [ItemController::class, 'removerItem'])->name('remover.item');
    Route::put('/item/alterar/quantidade', [ItemController::class, 'alterarQuantidadeItem'])->name('alterar.quantidade.item');
    Route::post('/item/buscar', [ItemController::class, 'adicionarItem'])->name('buscar.adicionar.item');

    Route::get('/pagamento', [PagamentoController::class, 'pagamento'])->name('view.pagamento');
    Route::post('/pagamento/salvar', [PagamentoController::class, 'criarPagamento'])->name('salvar.pagamento');

    Route::get('/nfe/salvar', [NFeController::class, 'criarNFe'])->name('salvar.nfe');
    Route::get('/nfe/{vendaId}', [NFeController::class, 'gerarNFe'])->name('gerar.nfe');

    Route::post('/cliente/identificar', [UsuarioController::class, 'identificarCliente'])->name('identificar.cliente');
});

Route::prefix('supervisor')->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('view.admin');
});