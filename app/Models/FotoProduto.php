<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class FotoProduto extends Model
{
    use HasFactory;
    protected $table = "foto_produto";

    function produto(){
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    
    }
}
