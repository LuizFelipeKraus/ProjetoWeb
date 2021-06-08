<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;
class Estado extends Model
{
    use HasFactory;
    protected $table = 'estado';

    function cidade(){
        return $this->hasMany(Cidade::class, 'id_estado', 'id');
    
    }
}
