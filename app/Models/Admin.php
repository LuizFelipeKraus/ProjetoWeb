<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";

use App\Models\Permissao;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "table_admin";


    function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }


    function permissao(){
        return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
    }

}
