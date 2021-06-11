@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Cidade') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('adicionar_cidade') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome" autofocus />

                                @error('nome')
                                <div class="alert alert-danger">{{ $mensagemSalvar }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sigla" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <select id="id_estado" name="id_estado" class="form-control @error('id_estado') is-invalid @enderror">
                                    @foreach($lEstado as $aEstado)
                                    <option value="{{$aEstado->id}}">{{$aEstado->nome}}</option>
                                    @endforeach
                                </select>

                                @error('id_estado')
                                <div class="alert alert-danger">{{ $mensagemSalvar}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection