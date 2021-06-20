<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
class EnderecoController extends Controller
{
    public function viewAdicionarEndereco(){
    	$lCidade = Cidade::all();
    	return view('EnderecoCadastrar', ["lCidade" => $lCidade]);
    }

    public function viewAlterarEndereco($id){
        $lEndereco = Endereco::find($id);
        $lCidade = Cidade::all();
        return view('alterarEndereco', ["lEndereco" => $lEndereco, "lCidade" => $lCidade]);
    }

    public function addEndereco(Request $req){

        $req->validate([
            'descricao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'numeric', 'max:999'],
            'bairro' => ['required', 'string', 'max:255']
        ]);

    	$aEndereco = new Endereco();

    	$aEndereco->descricao = $req->input('descricao');
    	$aEndereco->logradouro = $req->input('logradouro');
    	$aEndereco->numero = $req->input('numero');
    	$aEndereco->bairro = $req->input('bairro');
    	$aEndereco->id_cidade = $req->input('id_cidade');
    	$aEndereco->id_cliente = Auth::id();

    	$aEndereco->save();
    	return redirect()->route('home');
    }

    public function updateEndereco($id, Request $req){

        $req->validate([
            'descricao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'bairro' => ['required', 'string', 'max:255']
        ]);

        $e = Endereco::find($id);

        $e->descricao = $req->input('descricao');
        $e->logradouro = $req->input('logradouro');
        $e->numero = $req->input('numero');
        $e->bairro = $req->input('bairro');
        $e->id_cidade = $req->input('id_cidade');
        $e->id_cliente = Auth::id();

        $e->save();
        return redirect()->route('home');
    }

    public function deleteEndereco($id){
        $eEndereco = Endereco::find($id);

        $eEndereco->delete();
        return redirect()->route('home');
    }
}
