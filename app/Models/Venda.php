<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'venda';

    function produtos(){
        return $this->belongsToMany(Produto::class, 'venda_produto', 'id_venda', 'id_produto')->withPivot('quantidade_comprada', 'sub_total')->withTimestamps();
    }
    
    function endereco(){
    	return $this->belongsTo(Endereco::class, 'id_endereco', 'id');
    }
    function cliente(){
    	return $this->belongsTo(User::class, 'id_cliente', 'id');
    }
}
