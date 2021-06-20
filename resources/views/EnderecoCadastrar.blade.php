@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Endereço') }}</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('adicionar_endereco') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="logradouro" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>
                            <div class="col-md-6">
                                <input id="logradouro" type="text" class="form-control " name="logradouro" required
                                    autocomplete="logradouro" autofocus />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control " name="descricao" required
                                    autocomplete="descricao" autofocus />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control " name="bairro" required
                                    autocomplete="bairro" autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>
                            <div class="col-md-6">
                                <input id="numero" type="number" class="form-control " name="numero" required
                                    autocomplete="numero" autofocus />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_cidade"
                                class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_cidade" name="id_cidade">
                                    <option value="">Escolha uma Opção</option>
                                    @foreach($lCidade as $cidade)
                                        <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                                    @endforeach
                                </select>

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
