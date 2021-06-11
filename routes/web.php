<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::middleware('admin')->group(function(){
        /*Views Estado */
        Route::get('/view/estado/adicionar', [EstadoController::class, 'viewNovaEstado'])->name('view_adicionar_estado');
        Route::get('/view/estado/alterar/{id}', [EstadoController::class, 'viewAlterarEstado'])->name('view_alterar_estado');				
		Route::get('/view/estado/listar', [EstadoController::class, 'viewListaEstado'])->name('view_listar_estado');
        /*Funções Estado*/
        Route::post('/estado/adicionar', [EstadoController::class, 'novaEstado'])->name('adicionar_estado');
        Route::post('/estado/atualizar/{id}', [EstadoController::class, 'AlterarEstado'])->name('alterar_estado');		
		Route::get('/estado/deletar/{id}', [EstadoController::class, 'deletarEstado'])->name('deletar_estado');

        /*Views Cidade */
        Route::get('/view/cidade/adicionar', [CidadeController::class, 'viewNovaCidade'])->name('view_adicionar_cidade');
        Route::get('/view/cidade/alterar/{id}', [CidadeController::class, 'viewAlterarCidade'])->name('view_alterar_cidade');				
		Route::get('/view/cidade/listar', [CidadeController::class, 'viewListaCidade'])->name('view_listar_cidade');
        /*Funções Estado*/
        Route::post('/cidade/adicionar', [CidadeController::class, 'novaCidade'])->name('adicionar_cidade');
        Route::post('/cidade/atualizar/{id}', [CidadeController::class, 'AlterarCidade'])->name('alterar_cidade');		
		Route::get('/cidade/deletar/{id}', [CidadeController::class, 'deletarCidade'])->name('deletar_cidade');
    });
});