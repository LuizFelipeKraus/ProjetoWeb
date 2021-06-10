<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
class CategoriaProdutoController extends Controller
{
    function viewNovaCategoriaProduto(){
        return view('CategoriaProdutoCadastro');
    }

    function viewListaCategoriaProduto(){
        $lCategoriaProduto = CategoriaProduto::all();
        return view('CategoriaProdutoLista', ['lCategoriaProduto' => $lCategoriaProduto]);
    }

    function viewAlterarCategoriaProduto($id){
        $aCategoriaProduto = CategoriaProduto::findOrFail($id);
        return view('CategoriaProdutoAlterar',['aCategoriaProduto' => $aCategoriaProduto]);
    }

    function novaCategoriaProduto(Request $req){
        $nCategoriaProduto  = new CategoriaProduto();
        $nCategoriaProduto->nome = $req->input('nome');
        $nCategoriaProduto->categoria_pai = $req->input('categoria_pai');

        if($nCategoriaProduto->save()){
            session([
                'mensagemSalvar' => 'Sucesso ao adicionar uma nova categoria produto.'  
            ]);            
        }else{
            session([
                'mensagemSalvar' => 'Erro ao adicionar uma nova categoria produto.'  
            ]);
        }
        return redirect()->route('view_categoria_produto_lista');
    }

    function AlterarCategoriaProduto($id, Request $req){
        $aCategoriaProduto = CategoriaProduto::findOrFail($id);

        $aCategoriaProduto->nome = $req->input('nome');
        $aCategoriaProduto->categoria_pai = $req->input('categoria_pai');

        if($aCategoriaProduto->save()){
            session([
                'mensagemAlterar' => 'Sucesso ao alterar uma nova categoria produto.'  
            ]);            
        }else{
            session([
                'mensagemAlterar' => 'Erro ao alterar uma nova categoria produto.'  
            ]);
        }
        return redirect()->route('view_categoria_produto_lista');
    }

    function deletarCategoriaProduto($id){
        $dCategoriaProduto = CategoriaProduto::findOrFail($id);

        if($dCategoriaProduto->delete()){
            session([
                'mensagemDeletar' => 'Sucesso ao excluir uma nova categoria produto.'  
            ]);            
        }else{
            session([
                'mensagemDeletar' => 'Erro ao excluir uma nova categoria produto.'  
            ]);
        }
        return redirect()->route('view_categoria_produto_lista');
    }
}
