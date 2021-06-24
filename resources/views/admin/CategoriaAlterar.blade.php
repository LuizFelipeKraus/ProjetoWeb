@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alterar Categoria') }}</div>
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
                    <form method="POST" action="{{ route('alterar_categoria', ['id'=> $aCategoriaProduto->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control " name="nome" required
                                    autocomplete="nome" autofocus value="{{$aCategoriaProduto->nome}}"/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_pai"
                                class="col-md-4 col-form-label text-md-right">{{ __('Categoria Pai') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="categoria_pai" name="categoria_pai">
                                    <option value="">{{$aCategoriaProduto->categoria_pai}}</option>
                                    @foreach($lCategoriaProdutos as $categoria)
                                    <option>{{$categoria->nome}}</option>
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
