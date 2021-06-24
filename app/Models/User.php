<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Venda;
use App\Models\Endereco;

use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    //Funcionou

    //Teste

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'rg',
        'telefone',
        'data_nascimento',
        'permissao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function admin(){
        return $this->permissao == 1;
    }

    public function getId()
    {
        return $this->id;
    }

    function endereco(){
        return $this->hasMany(Endereco::class, 'id_cliente', 'id');
    }
    function venda(){
        return $this->hasMany(Venda::class, 'id_cliente', 'id');
    }
}
