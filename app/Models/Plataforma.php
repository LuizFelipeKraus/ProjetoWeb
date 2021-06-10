<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class Plataforma extends Model
{
    use HasFactory;
    protected $table = "plataforma";

    function produto(){       
        return $this->hasMany(Produto::class, 'id_plataforma', 'id');
    }
}
