<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProduto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categoria_produto";

    function produto(){       
        return $this->hasMany(Produto::class, 'id_categoria_produto', 'id');
    }
}
