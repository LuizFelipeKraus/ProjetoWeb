<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\FotoProduto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = rand(11,18);
        $produn = Produto::find($id);
        $produto = Produto::all();
        return view('home', [
            'ps' => $produto,
            'produn' => $produn
        ]);
    }
}
