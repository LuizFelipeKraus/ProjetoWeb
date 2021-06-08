<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;
use App\Models\Plataforma;
use App\Models\CategoriaProduto;
use App\Models\FotoProduto;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "produto";

    function vendas(){
        return $this->belongsToMany(Venda::class, 'venda_produto', 'id_produto', 'id_venda')->withPivot('quantidade_comprada', 'subtotal')->withTimestamps();
    }
    
    function categoriaProduto(){
        return $this->belongsTo(CategoriaProduto::class, 'id_categoria_produto', 'id');
    }

    function plataforma(){
        return $this->belongsTo(Plataforma::class, 'id_plataforma', 'id');
    }

    function fotoProduto(){
        return $this->hasMany(FotoProduto::class, 'id_produto', 'id');
    }
}
