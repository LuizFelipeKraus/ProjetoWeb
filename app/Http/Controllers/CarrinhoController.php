<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Venda;
use Illuminate\Support\Facades\Auth;
use App\Models\Endereco;

class CarrinhoController extends Controller
{
    function preAdicao($produto){
        $p = Produto::find($produto);
        $lEndereco = Endereco::all();
        $carrinho = session('carrinho');
        return view('carrinho', [
            'produto' => $p, 
            'carrinho' => $carrinho,
            'lEndereco' => $lEndereco
        ]);
    }

    function viewVenda(){
        $listaVenda = Venda::where('id_cliente', '=' ,Auth::id())->get();
        
            return view('venda', ['listaVenda' => $listaVenda]);
        
    }


    function finalizaAdicao(Request $req){
        $p = Produto::find($req->input('id'));
        $var =  $p->id;
        $informacoes = [
            'produto' => $p,
            'quantidade' => $req->input('quantidade')
        ];

        if (!session()->exists('carrinho')){
            $carrinho = [];
            $carrinho[] = $informacoes;
            session(['carrinho' => $carrinho]);
        } else {
            $carrinho = session('carrinho');

            $atualizacao = false;
            for($i=0; $i<count($carrinho); $i++){
                if ($carrinho[$i]['produto']->id == $p->id){
                    $carrinho[$i]['quantidade'] += $informacoes['quantidade'];
                    $atualizacao = true;
                }
            }

            if (!$atualizacao){
                $carrinho[] = $informacoes;
            }
            session(['carrinho' => $carrinho]);
        }

        return redirect()->route('home');

    }

    function visualiza(){
        $p = null;
        $carrinho = session('carrinho');
        $lEndereco = Endereco::where('id_cliente', '=' ,Auth::id())->get();
        return view('carrinho', [
            'produto' => $p, 
            'carrinho' => $carrinho,
            'lEndereco' => $lEndereco
        ]);
    }

    function fechaCarrinho(Request $req){
        $venda = new Venda();
        $venda->valor_total = 0;
        $venda->id_cliente = Auth::id();
        $venda->id_endereco = $req->input('endereco');
        $venda->quatidade_total = 0;
        
        $venda->save();

        $carrinho = session('carrinho');
        $valor_total = 0;

        foreach ($carrinho as $c){
            $valor_total += $c['produto']->valor * $c['quantidade'];

            $c['produto']->quantidade -= $c['quantidade'];
            $c['produto']->save();

            $venda->produtos()->attach($c['produto']->id, [
                'quantidade_comprada' => $c['quantidade'],
                'sub_total' => $c['produto']->valor * $c['quantidade']
            ]);
        }
        
        # Atualiza venda
        $venda->quatidade_total = count($carrinho);
        $venda->valor_total = $valor_total;
        
        
        $venda->save();

        session()->forget('carrinho');
        session()->flash('mensagem', 'Venda efetuada com sucesso');

        return redirect()->route('view_vendas');

    }
    
    public function excluiCarrinho($id){
        
        $carts = session()->get('carrinho');      
        unset($carts[$id]);
        session()->forget('carrinho');
        session()->put('carrinho', $carts);
        return redirect()->route('carrinho');
	}
}
