@extends('layouts.app')

@section('content')

@if (isset($carrinho))
<div class="container mt-5">



    <h1 class="text-center">
        <span class="grad">
            <strong>Seu carrinho</strong>
        </span>
    </h1>
    <div class="container">

        <div class="card-group border-5 overflow justify-content-center p-5">

            @php
            $total = 0;
            @endphp
            @foreach ($carrinho as $k => $c)
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{url($c['produto']->fotoProduto->first()->nome_arquivo)}}" alt="..." width="150"
                                height="150">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Produto: {{$c['produto']->nome}}</h5>
                                    <a href="#" onclick="excluirCarrinho({{key($carrinho)}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                        </svg></a>
                                </div>
                                @php
                                $total += $c['quantidade'] * $c['produto']->valor;
                                @endphp
                                <p class="card-text">Valor: R${{ $c['quantidade'] * $c['produto']->valor}}</p>
                                <p class="card-text"><small class="text-muted">Quantidade:
                                        {{ $c['quantidade']}}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 alert alert-light" role="alert">
                <h3 class="col-md-5 text-success"><strong>
                        Total: R$ {{ $total }} </strong></h3>
                <div class="form-group">

                    <form action="{{ route('fecha_carrinho') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="endereco"
                                class="col-md-1 ml-3 col-form-label text-md-right">{{('Endereço') }}:</label>
                            <div class="col-md-8 ml-3">
                                <select class="form-control" id="endereco" name="endereco">
                                    @foreach($lEndereco as $endereco)
                                    <option value="{{$endereco->id}}">{{$endereco->logradouro}},
                                        {{$endereco->numero}} -
                                        {{$endereco->bairro}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            @if(Auth::user()->permissao == 1 )
                               
                            @else
                            @if($total == 0)
                            
                            @else
                            <input type="submit" value="Fechar Compra" class="btn btn-primary">

                            <a href="{{route('view_adicionar_endereco')}}" class="btn btn-success me-md-2"
                                type="button"> Cadastrar Novo Endereço</a>

                                @endif
                            @endif
                        </div>
                </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<script>
    function excluirCarrinho(id) {
        if (confirm("Deseja remover do de id: " + id + "?")) {
            location.href = "/carrinho/remover/" + id;
           
        }
    }

</script>
@endif
@endsection
