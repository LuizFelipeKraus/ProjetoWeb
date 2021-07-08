<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plataforma;
class PlataformaController extends Controller
{
    function viewNovaPlataforma(){
        return view('admin.PlataformaCadastrar');
    }

    function viewListaPlataforma(){
        $lPlataforma= Plataforma::all();
        return view('admin.PlataformaLista', ['lPlataforma' => $lPlataforma]);
    }

    function viewAlterarPlataforma($id){
        $aPlataforma = Plataforma::findOrFail($id);
        return view('admin.PlataformaAlterar',['aPlataforma' => $aPlataforma]);
    }

    function novaPlataforma(Request $req){
        $nPlataforma = new Plataforma();
        $nPlataforma->nome = $req->input('nome');
        $req->validate([
    	    'nome' => ['required', 'string', 'max:60']
    	    
    	]);

        $nPlataforma->save();
        return redirect()->route('view_listar_plataforma');
    }

    function AlterarPlataforma($id, Request $req){
        $aPlataforma = Plataforma::findOrFail($id);

        $aPlataforma->nome = $req->input('nome');
        $req->validate([
    	    'nome' => ['required', 'string', 'max:60']
    	    
    	]);
        $aPlataforma->save();
        return redirect()->route('view_listar_plataforma');
    }

    function deletarPlataforma($id){
        $dPlataforma = Plataforma::findOrFail($id);
        $dPlataforma->delete();
        return redirect()->route('view_listar_plataforma');
    }
}
