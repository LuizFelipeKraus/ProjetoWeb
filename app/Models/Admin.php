<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
<<<<<<< HEAD
use App\Models\Permissao;
=======

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";

use App\Models\Permissao;
use Illuminate\Database\Eloquent\SoftDeletes;

>>>>>>> 26d94f601232ff7e594dbf6f41d5cc71f4fb5ebe
class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";


    function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

<<<<<<< HEAD
    function permissao(){
        return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
    }
}
=======

    function permissao(){
        return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
    }

}
>>>>>>> 26d94f601232ff7e594dbf6f41d5cc71f4fb5ebe
