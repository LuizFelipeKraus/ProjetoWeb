@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 ">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{url($produto->fotoProduto->first()->nome_arquivo)}}" class="d-block w-100"
                            alt="..." />
                    </div>
                    @foreach($produto->fotoProduto as $foto)
                    @if(url($foto->nome_arquivo) != url($produto->fotoProduto->first()->nome_arquivo))
                    <div class="carousel-item">
                        <img src="{{url($foto->nome_arquivo)}}" class="d-block w-100" alt="..." />
                    </div>
                    @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 text-left">
            <div>
                <h1>{{$produto->nome}}</h1>
                <p>{{$produto->categoriaProduto->nome}}</p>
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
                            <select name="quantidade" class="form-control">

                                @for($i = 0; $i <= $produto->quantidade; $i = $i + 1)
                                    <option>{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" value="Adicionar" class="btn btn-primary">
                        </div>
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
