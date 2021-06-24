<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ProdutoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){
    Route::middleware('admin')->group(function(){
        //Views Estado //
        Route::get('/view/estado/adicionar', [EstadoController::class, 'viewNovaEstado'])->name('view_adicionar_estado');
        Route::get('/view/estado/alterar/{id}', [EstadoController::class, 'viewAlterarEstado'])->name('view_alterar_estado');				
		Route::get('/view/estado/listar', [EstadoController::class, 'viewListaEstado'])->name('view_listar_estado');
        //Funções Estado//
        Route::post('/estado/adicionar', [EstadoController::class, 'novaEstado'])->name('adicionar_estado');
        Route::post('/estado/atualizar/{id}', [EstadoController::class, 'AlterarEstado'])->name('alterar_estado');		
		Route::get('/estado/deletar/{id}', [EstadoController::class, 'deletarEstado'])->name('deletar_estado');

        //Views Cidade //
        Route::get('/view/cidade/adicionar', [CidadeController::class, 'viewNovaCidade'])->name('view_adicionar_cidade');
        Route::get('/view/cidade/alterar/{id}', [CidadeController::class, 'viewAlterarCidade'])->name('view_alterar_cidade');				
		Route::get('/view/cidade/listar', [CidadeController::class, 'viewListaCidade'])->name('view_listar_cidade');
        //Funções Estado//
        Route::post('/cidade/adicionar', [CidadeController::class, 'novaCidade'])->name('adicionar_cidade');
        Route::post('/cidade/atualizar/{id}', [CidadeController::class, 'AlterarCidade'])->name('alterar_cidade');		
		Route::get('/cidade/deletar/{id}', [CidadeController::class, 'deletarCidade'])->name('deletar_cidade');

         //Views Categoria //
         Route::get('/view/categoria/adicionar', [CategoriaProdutoController::class, 'viewNovaCategoriaProduto'])->name('view_adicionar_categoria');
         Route::get('/view/categoria/alterar/{id}', [CategoriaProdutoController::class, 'viewAlterarCategoriaProduto'])->name('view_alterar_categoria');				
         Route::get('/view/categoria/listar', [CategoriaProdutoController::class, 'viewListaCategoriaProduto'])->name('view_listar_categoria');
         //Funções Categoria//
         Route::post('/categoria/adicionar', [CategoriaProdutoController::class, 'novaCategoriaProduto'])->name('adicionar_categoria');
         Route::post('/categoria/atualizar/{id}', [CategoriaProdutoController::class, 'AlterarCategoriaProduto'])->name('alterar_categoria');		
         Route::get('/categoria/deletar/{id}', [CategoriaProdutoController::class, 'deletarCategoriaProduto'])->name('deletar_categoria');

          //Views Plataforma //
          Route::get('/view/plataforma/adicionar', [PlataformaController::class, 'viewNovaPlataforma'])->name('view_adicionar_plataforma');
          Route::get('/view/plataforma/alterar/{id}', [PlataformaController::class, 'viewAlterarPlataforma'])->name('view_alterar_plataforma');				
          Route::get('/view/plataforma/listar', [PlataformaController::class, 'viewListaPlataforma'])->name('view_listar_plataforma');
          //Funções Plataforma//
          Route::post('/plataforma/adicionar', [PlataformaController::class, 'novaPlataforma'])->name('adicionar_plataforma');
          Route::post('/plataforma/atualizar/{id}', [PlataformaController::class, 'AlterarPlataforma'])->name('alterar_plataforma');		
          Route::get('/plataforma/deletar/{id}', [PlataformaController::class, 'deletarPlataforma'])->name('deletar_plataforma');
          
          //Views Produto //
          Route::get('/view/produto/adicionar', [ProdutoController::class, 'viewNovaProduto'])->name('view_adicionar_produto');
          Route::get('/view/produto/alterar/{id}', [ProdutoController::class, 'viewAlterarProduto'])->name('view_alterar_produto');				
          Route::get('/view/produto/listar', [ProdutoController::class, 'viewListaProduto'])->name('view_listar_produto');
          //Funções Plataforma//
          Route::post('/produto/adicionar', [ProdutoController::class, 'novaProduto'])->name('adicionar_produto');
          Route::post('/produto/atualizar/{id}', [ProdutoController::class, 'AlterarProduto'])->name('alterar_produto');		
          Route::get('/produto/deletar/{id}', [ProdutoController::class, 'deletarProduto'])->name('deletar_produto');

          //Views Usuários //
          Route::get('/view/Auth/listar', [AuthController::class, 'viewListaAuth'])->name('view_listar_auth');
          //Funções Usuários//
          Route::get('/usuario/permissao/{id}', [AuthController::class, 'permissaoAuth'])->name('permissao_usuario');

    });

    // Views Endereços //
	Route::get('/view/endereco/adicionar', [EnderecoController::class,'viewAdicionarEndereco'])->name('view_adicionar_endereco');
	
	//Funções Endereços//
	Route::post('/endereco/registrar',[EnderecoController::class, 'addEndereco'])->name('adicionar_endereco');		
	
    //Views Home//
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Views Carrinho//
    Route::get('/carrinho/pre-adicao/{produto}', [CarrinhoController::class, 'preAdicao'])->name('view_adiciona_carrinho');
    Route::post('/carrinho/adiciona', [CarrinhoController::class, 'finalizaAdicao'])->name('finaliza_adicao_carrinho');
    Route::get('/carrinho', [CarrinhoController::class, 'visualiza'])->name('carrinho');
    Route::post('/fecha_carrinho', [CarrinhoController::class, 'fechaCarrinho'])->name('fecha_carrinho');
    Route::get('/carrinho/remover/{id}', [CarrinhoController::class, 'excluiCarrinho'])->name('remover_carrinho');

    //Views Produto//
    Route::get('/view/produto/unitario/{produto}', [ProdutoController::class, 'viewProdutosUnitario'])->name('view_unitario_produtos');
    
    //Views Vendas//
    Route::get('/tela/vendas',[CarrinhoController::class, 'viewVenda'])->name('view_vendas');
    
});

Auth::routes();

