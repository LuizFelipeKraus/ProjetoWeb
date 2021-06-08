<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modles\Estado;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "cidade";

    function estado(){
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }

    function endereco(){
        return $this->hasMany(Endereco::class, 'id_cidade', 'id');
    }
}
