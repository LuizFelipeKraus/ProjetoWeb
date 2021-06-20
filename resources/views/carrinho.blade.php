@extends('layouts.app')

@section('content')

@if(isset($produto))
<h1>Carrinho</h1>
<div class="form-group">
    <form action="{{ route('finaliza_adicao_carrinho') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $produto->id }}" name="id">
        <div class="row">
            <div class="col-md-5">
                {{ $produto->nome }}
            </div>
            <div class="col-md-5">
                <select name="quantidade" class="form-select">

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
@endif
@if (isset($carrinho))
<h2> Você já tem no carrinho:</h2>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach ($carrinho as $k => $c)
                <tr>
                    <td>{{$k}}</td>
                    <td>{{ $c['produto']->nome }}</td>
                    <td>{{ $c['quantidade']}}</td>
                    @php
                    $total += $c['quantidade'] * $c['produto']->valor;
                    @endphp
                    <td>{{ $c['quantidade'] * $c['produto']->valor}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        Total: R$ {{ $total }}
        <div class="form-group">
            <form action="{{ route('fecha_carrinho') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="endereco" name="endereco">
                            <option value="">Escolha uma Opção</option>
                            @foreach($lEndereco as $endereco)
                            <option value="{{$endereco->id}}">{{$endereco->logradouro}}, {{$endereco->numero}} - {{$endereco->bairro}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <input type="submit" value="Fechar Compra" class="btn btn-primary">
                </div>
        </div>
        </form>
    </div>
   
</div>
<div class="col-md-2"></div>
</div>
@endif
@endsection
