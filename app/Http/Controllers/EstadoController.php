<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
class EstadoController extends Controller
{
    function viewNovaEstado(){
        return view('admin.EstadoCadastro');
    }

    function viewListaEstado(){
        $lEstado= Estado::all();
        return view('admin.EstadoLista', ['lEstado' => $lEstado]);
    }

    function viewAlterarEstado($id){
        $aEstado = Estado::findOrFail($id);
        return view('admin.EstadoAlterar',['aEstado' => $aEstado]);
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
        return redirect()->route('view_listar_estado');
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
        return redirect()->route('view_listar_estado');
    }

    function deletarEstado($id){
        $dEstado = estado::findOrFail($id);
        $dEstado->delete();
        return redirect()->route('view_listar_estado');
    }
}
