<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "cliente";

    function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    function endereco(){
        return $this->hasMany(Endereco::class, 'id_cliente', 'id');
    }
    
}
