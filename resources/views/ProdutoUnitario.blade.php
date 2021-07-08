@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 ">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active border border border-dark rounded">
                        <img src="{{url($produto->fotoProduto->first()->nome_arquivo)}}" class="d-block w-100"
                            alt="..." />
                    </div>
                    @foreach($produto->fotoProduto as $foto)
                    @if(url($foto->nome_arquivo) != url($produto->fotoProduto->first()->nome_arquivo))
                    <div class="carousel-item border border border-dark rounded">
                        <img src="{{url($foto->nome_arquivo)}}" class="d-block w-100" alt="..." />
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 text-left  text-light">
            <div>
                <h1>{{$produto->nome}}</h1>
                <p>{{$produto->categoriaProduto->nome}}</p>
                <p>{{$produto->plataforma->nome}}</p>
            </div>
            <div class="col-md-6">
                <h2 class="mb-5">R$ {{$produto->valor}}</h2>
            </div>
            <div class="mt-5">
                <form action="{{ route('finaliza_adicao_carrinho') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $produto->id }}" name="id">
                    <div class="row">
                        <div class="col-md-5">
                        @if($produto->quantidade == 0)
                                    <h2 class="text-danger">Produto Esgotado</h2>
                        @else
                            <select name="quantidade" class="form-control">
                               
                                @for($i = 1; $i <= $produto->quantidade; $i = $i + 1)
                                    
                                    <option>{{$i}}</option>
                                @endfor
                                
                            </select>
                           
                        </div>
                        <div class="col-md-2">
                            @if(Auth::user()->permissao == 1)
                                
                            @else
                            <input type="submit" value="Adicionar" class="btn btn-primary">

                            @endif
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="mt-4">
                <p style="font-size:20px;">{{$produto->descricao}}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
