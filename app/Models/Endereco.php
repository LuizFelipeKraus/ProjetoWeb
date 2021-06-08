<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;
use App\Models\Cliente;

class Endereco extends Model
{
    use HasFactory;
    protected $table = "endereco";

    function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    function cidade(){
        return $this->belongsTo(Cidade::class, 'id_cidade', 'id');
    }
}
