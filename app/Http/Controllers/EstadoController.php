<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
class EstadoController extends Controller
{
    function viewNovaEstado(){
        return view('EstadoCadastro');
    }

    function viewListaEstado(){
        $lEstado= Estado::all();
        return view('EstadoLista', ['lEstado' => $lEstado]);
    }

    function viewAlterarEstado($id){
        $aEstado = Estado::findOrFail($id);
        return view('EstadoAlterar',['aEstado' => $aEstado]);
    }

    function novaEstado(Request $req){
        $nEstado = new Estado();
        $nEstado->nome = $req->input('nome');
        $nEstado->sigla = $req->input('sigla');

        if($nEstado->save()){
            session([
                'mensagemSalvar' => 'Sucesso ao adicionar uma nova estado.'  
            ]);            
        }else{
            session([
                'mensagemSalvar' => 'Erro ao adicionar uma nova estado.'  
            ]);
        }
        return redirect()->route('view_estado_lista');
    }

    function AlterarEstado($id, Request $req){
        $aEstado = Estado::findOrFail($id);

        $aEstado->nome = $req->input('nome');
        $aEstado->sigla = $req->input('sigla');

        if($aEstado->save()){
            session([
                'mensagemAlterar' => 'Sucesso ao alterar uma nova estado.'  
            ]);            
        }else{
            session([
                'mensagemAlterar' => 'Erro ao alterar uma nova estado.'  
            ]);
        }
        return redirect()->route('view_estado_lista');
    }

    function deletarestado($id){
        $dEstado = estado::findOrFail($id);

        if($dEstado->delete()){
            session([
                'mensagemDeletar' => 'Sucesso ao excluir uma nova estado.'  
            ]);            
        }else{
            session([
                'mensagemDeletar' => 'Erro ao excluir uma nova estado.'  
            ]);
        }
        return redirect()->route('view_estado_lista');
    }
}
