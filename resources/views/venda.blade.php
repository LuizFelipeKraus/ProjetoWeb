@extends('layouts.app')

@section('content')

@if (isset($listaVenda))
<div class="container mt-5">



    <h1 class="text-center">
        <span class="grad">
            <strong>Suas Compras</strong>
        </span>
    </h1>
    <div class="container">

        <div class="card-group border-5 overflow justify-content-center p-5">
            @foreach ($listaVenda as $venda)
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Id da Venda: {{$venda->id}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Valor: R${{$venda->valor_total}}</h6>
                                    <p class="card-text">Endereço de Entrega:{{$venda->endereco->logradouro}}:{{$venda->endereco->numero }}-{{ $venda->endereco->cidade->nome}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
