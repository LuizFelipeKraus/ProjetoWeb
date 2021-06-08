<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permissao;
class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";

    function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    function permissao(){
        return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
    }
}