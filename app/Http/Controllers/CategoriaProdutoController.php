<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
class CategoriaProdutoController extends Controller
{
    function viewNovaCategoriaProduto(){
        $lCategorias = CategoriaProduto::all();
        return view('admin.CategoriaCadastrar', [
            'lCategorias' => $lCategorias
        ]);
    }

    function viewListaCategoriaProduto(){
        $lCategoriaProduto = CategoriaProduto::all();
        return view('admin.CategoriaListar', ['lCategoriaProdutos' => $lCategoriaProduto]);
    }

    function viewAlterarCategoriaProduto($id){
        $aCategoriaProduto = CategoriaProduto::findOrFail($id);
        $lCategorias = CategoriaProduto::all();
        return view('admin.CategoriaAlterar',[
            'aCategoriaProduto' => $aCategoriaProduto,
            'lCategoriaProdutos' => $lCategorias
        ]);
    }

    function novaCategoriaProduto(Request $req){
        $nCategoriaProduto  = new CategoriaProduto();
        $nCategoriaProduto->nome = $req->input('nome');
        $nCategoriaProduto->categoria_pai = $req->input('categoria_pai');
        $req->validate([
    	    'nome' => ['required', 'string', 'max:75'],
    	    'categoria_pai'=> [ 'max:75']
    	]);
        $nCategoriaProduto->save();
        return redirect()->route('view_listar_categoria');
    }

    function AlterarCategoriaProduto($id, Request $req){
        $aCategoriaProduto = CategoriaProduto::findOrFail($id);

        $aCategoriaProduto->nome = $req->input('nome');
        $aCategoriaProduto->categoria_pai = $req->input('categoria_pai');
        $req->validate([
    	    'nome' => ['required', 'string', 'max:75'],
    	    'categoria_pai'=> ['max:75']
    	]);
        $aCategoriaProduto->save();
        
        return redirect()->route('view_listar_categoria');
    }

    function deletarCategoriaProduto($id){
        $dCategoriaProduto = CategoriaProduto::findOrFail($id);

        $dCategoriaProduto->delete();
        return redirect()->route('view_listar_categoria');
    }
}
