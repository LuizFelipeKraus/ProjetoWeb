<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
class CidadeController extends Controller
{
    function viewNovaCidade(){
        return view('CidadeCadastro');
    }

    function viewListaCidade(){
        $lCidade = Cidade::all();
        return view('CidadeLista', ['lCidade' => $lCidade]);
    }

    function viewAlterarCidade($id){
        $aCidade = Cidade::findOrFail($id);
        return view('CidadeAlterar',['aCidade' => $aCidade]);
    }

    function novaCidade(Request $req){
        $nCidade = new Cidade();
        $nCidade->nome = $req->input('nome');
        $nCidade->id_estado = $req->input('id_estado');

        if($nCidade->save()){
            session([
                'mensagemSalvarCidade' => 'Sucesso ao adicionar uma nova cidade.'  
            ]);            
        }else{
            session([
                'mensagemSalvarCidade' => 'Erro ao adicionar uma nova cidade.'  
            ]);
        }
        return redirect()->route('view_cidade_lista');
    }

    function AlterarCidade($id, Request $req){
        $aCidade = Cidade::findOrFail($id);

        $aCidade->nome = $req->input('nome');
        $aCidade->id_estado = $req->input('id_estado');

        if($aCidade->save()){
            session([
                'mensagemSalvarCidade' => 'Sucesso ao alterar uma nova cidade.'  
            ]);            
        }else{
            session([
                'mensagemSalvarCidade' => 'Erro ao alterar uma nova cidade.'  
            ]);
        }
        return redirect()->route('view_cidade_lista');
    }

    function deletarCidade($id){
        $dCidade = Cidade::findOrFail($id);

        if($dCidade->delete()){
            session([
                'mensagemSalvarCidade' => 'Sucesso ao excluir uma nova cidade.'  
            ]);            
        }else{
            session([
                'mensagemSalvarCidade' => 'Erro ao excluir uma nova cidade.'  
            ]);
        }
        return redirect()->route('view_cidade_lista');
    }

    
}
