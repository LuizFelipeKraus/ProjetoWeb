<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Estado;

class CidadeController extends Controller
{
    function viewNovaCidade(){
        $lEstado = Estado::all();
        return view('admin.CidadeCadastrar', [
            'lEstado' => $lEstado
        ]);
    }

    function viewListaCidade(){
        $lCidade = Cidade::all();
        return view('admin.CidadeListar', ['lCidade' => $lCidade]);
    }

    function viewAlterarCidade($id){
        $aCidade = Cidade::findOrFail($id);
        $lEstado = Estado::all();
        return view('admin.CidadeAlterar',[
            'aCidade' => $aCidade,
            'lEstado' => $lEstado
        ]);
    }

    function novaCidade(Request $req){
        $nCidade = new Cidade();
        $nCidade->nome = $req->input('nome');
        $nCidade->id_estado = $req->input('id_estado');
        
        $req->validate([
    	    'nome' => ['required', 'string', 'max:60'],
    	    'id_estado' => ['required', 'integer', 'max:60']
    	]);

        $nCidade->save();
        return redirect()->route('view_listar_cidade');
    }

    function AlterarCidade($id, Request $req){
        $aCidade = Cidade::findOrFail($id);

        $aCidade->nome = $req->input('nome');
        $aCidade->id_estado = $req->input('id_estado');

        
        $req->validate([
    	    'nome' => ['required', 'string', 'max:60'],
    	    'id_estado' => ['required', 'integer', 'max:60']
    	]);

        $aCidade->save();
        return redirect()->route('view_listar_cidade');
    }

    function deletarCidade($id){
        $dCidade = Cidade::findOrFail($id);

        $dCidade->delete();
        return redirect()->route('view_listar_cidade');
    }

    
}
