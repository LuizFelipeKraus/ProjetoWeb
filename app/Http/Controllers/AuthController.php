<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    function viewListaAuth(){
        $lAuth = User::all();
        return view('admin.ClienteLista', ['lAuth' => $lAuth]);
    }

    function permissaoAuth($id){
        $dAuth = User::findOrFail($id);
        if($dAuth->permissao == 0){
            $dAuth->permissao = 1;
            $dAuth->save();
        }
        return redirect()->route('view_listar_auth');
    }
}
