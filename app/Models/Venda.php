<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Venda extends Model
{
    use HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'venda';

    function produtos(){
        return $this->belongsToMany(Produto::class, 'venda_produto', 'id_venda', 'id_produto')->withPivot('quantidade_comprada', 'subtotal')->withTimestamps();
    }
}
