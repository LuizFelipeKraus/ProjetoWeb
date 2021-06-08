<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";

    function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    
}
