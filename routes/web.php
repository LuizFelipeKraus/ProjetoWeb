<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
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
        Route::get('/tela/estado/adicionar', [EstadoController::class, 'viewNovaEstado'])->name('view_adicionar_estado');
        Route::get('/tela/estado/alterar/{id}', [EstadoController::class, 'viewAlterarEstado'])->name('view_alterar_estado');				
		Route::get('/tela/estado/listar', [EstadoController::class, 'viewListaEstado'])->name('view_listar_estado');
        /*Funções Estado*/
        Route::post('/estado/adicionar', [EstadoController::class, 'novaEstado'])->name('adicionar_estado');
        Route::post('/estado/atualizar/{id}', [EstadoController::class, 'AlterarEstado'])->name('alterar_estado');		
		Route::get('/estado/deletar/{id}', [EstadoController::class, 'deletarEstado'])->name('deletar_estado');
    });
});