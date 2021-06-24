<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'estado';

    function cidade(){
        return $this->hasMany(Cidade::class, 'id_estado', 'id');
    
    }
}
