<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = "categoria_produto";

    function produto(){       
        return $this->hasMany(Produto::class, 'id_categoria_produto', 'id');
    }
}
