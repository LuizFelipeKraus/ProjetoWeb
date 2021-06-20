<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
use App\models\Plataforma;
use App\Models\Produto;
use App\Models\FotoProduto;
class ProdutoController extends Controller
{
    
    function viewProdutosUnitario($produto){
        $p = Produto::findOrFail($produto);

        return view('ProdutoUnitario', [
            'produto' => $p

        ]);
    }

    function viewNovaProduto(){
        $lCategorias = CategoriaProduto::all();
        $lPlataforma = Plataforma::all();
        return view('admin.ProdutoCadastrar', [
            'lCategorias' => $lCategorias,
            'lPlataforma' => $lPlataforma
        ]);
    }

    function viewListaProduto(){
        $lProduto = Produto::all();
        return view('admin.ProdutoListar', ['lProdutos' => $lProduto ]);
    }

    function viewAlterarProduto($id){
        $aProduto = Produto::findOrFail($id);
        $lCategorias = CategoriaProduto::all();
        $lPlataforma = Plataforma::all();
        return view('admin.ProdutoAlterar',['aProduto' => $aProduto,
        'lCategorias' => $lCategorias,
        'lPlataforma' => $lPlataforma
        ]);
    }

    function novaProduto(Request $req){
        $nProduto = new Produto();
       
        $req->validate([
            'nome' => ['required', 'string', 'max:255'],
            'quantidade' => ['required', 'numeric', 'min:1'],
            'valor' => ['required',  'numeric', 'min:1'],
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        $nProduto->nome = $req->input('nome');
        $nProduto->quantidade = $req->input('quantidade');
        $nProduto->valor = $req->input('valor');
        $nProduto->descricao = $req->input('descricao');
        $nProduto->id_categoria_produto = $req->input('id_categoria_produto');
        $nProduto->id_plataforma = $req->input('id_plataforma');
        
        $nProduto->save();

        $img1 = $req->file('img1'); 
        $img2 = $req->file('img2'); 
        $img3 = $req->file('img3'); 
        $img4 = $req->file('img4'); 
        $img5 = $req->file('img5');

        if(isset($img1)){
            $f = new FotoProduto();
            $extensao = $img1->extension();
            $nome_img = "{img1_$nProduto->id}.{$extensao}"; 
            $nome_img = $img1->storeAs('imagem_produto', $nome_img);

            $f->nome_arquivo = "/storage/{$nome_img}";
            $f->id_produto = $nProduto->id;
            $f->save();
        }

        if(isset($img2)){
            $f = new FotoProduto();
            $extensao = $img2->extension();
            $nome_img = "{img2_$nProduto->id}.{$extensao}"; 
            $nome_img = $img2->storeAs('imagem_produto', $nome_img);

            $f->nome_arquivo = "/storage/{$nome_img}";
            $f->id_produto = $nProduto->id;
            $f->save();
        }

        if(isset($img3)){
            $f = new FotoProduto();
            $extensao = $img3->extension();
            $nome_img = "{img3_$nProduto->id}.{$extensao}"; 
            $nome_img = $img3->storeAs('imagem_produto', $nome_img);

            $f->nome_arquivo = "/storage/{$nome_img}";
            $f->id_produto = $nProduto->id;
            $f->save();
        }

        if(isset($img4)){
            $f = new FotoProduto();
            $extensao = $img4->extension();
            $nome_img = "{img4_$nProduto->id}.{$extensao}"; 
            $nome_img = $img4->storeAs('imagem_produto', $nome_img);

            $f->nome_arquivo = "/storage/{$nome_img}";
            $f->id_produto = $nProduto->id;
            $f->save();;
        }

        if(isset($img5)){
            $f = new FotoProduto();
            $extensao = $img5->extension();
            $nome_img = "{img5_$nProduto->id}.{$extensao}"; 
            $nome_img = $img5->storeAs('imagem_produto', $nome_img);

            $f->nome_arquivo = "/storage/{$nome_img}";
            $f->id_produto = $nProduto->id;
            $f->save();
        }
        $nProduto->save();
        return redirect()->route('view_listar_produto');
    }

    function AlterarProduto($id, Request $req){
        $aProduto = Produto::findOrFail($id);

        $req->validate([
            'nome' => ['required', 'string', 'max:255'],
            'quantidade' => ['required', 'numeric', 'min:1'],
            'valor' => ['required',  'numeric', 'min:1'],
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        $aProduto->nome = $req->input('nome');
        $aProduto->quantidade = $req->input('quantidade');
        $aProduto->valor = $req->input('valor');
        $aProduto->descricao = $req->input('descricao');
        $aProduto->id_categoria_produto = $req->input('id_categoria_produto');
        $aProduto->id_plataforma = $req->input('id_plataforma');


        $aProduto->save();
        return redirect()->route('view_listar_produto');
    }

    function deletarProduto($id){
        $dProduto = Produto::findOrFail($id);
        $dProduto->delete();
        return redirect()->route('view_listar_produto');
    }
}
