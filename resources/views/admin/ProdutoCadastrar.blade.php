@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Produto') }}</div>
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
                    <form method="POST" action="{{ route('adicionar_produto') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control " name="nome" required
                                    autocomplete="nome" autofocus />

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
                            <label for="quantidade" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade') }}</label>
                            <div class="col-md-6">
                                <input id="quantidade" type="number" class="form-control " name="quantidade" required
                                    autocomplete="quantidade" autofocus />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>
                            <div class="col-md-6">
                                <input id="valor" type="number" class="form-control " name="valor" required
                                    autocomplete="valor" autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_categoria_produto"
                                class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_categoria_produto" name="id_categoria_produto">
                                    <option value="">Selecionar Categoria do Produto</option>
                                    @foreach($lCategorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_plataforma"
                                class="col-md-4 col-form-label text-md-right">{{ __('Plataforma') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_plataforma" name="id_plataforma">
                                    <option value="">Selecionar Plataforma do Produto</option>
                                    @foreach($lPlataforma as $plataforma)
                                        <option value="{{$plataforma->id}}">{{$plataforma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img1" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 1') }}</label>
                            <div class="col-md-6">
                                <input id="img1" type="file" class="form-control-file" name="img1" 
                                    />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img2" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 2') }}</label>
                            <div class="col-md-6">
                                <input id="img2" type="file" class="form-control-file" name="img2" 
                                    />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img3" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 3') }}</label>
                            <div class="col-md-6">
                                <input id="img3" type="file" class="form-control-file" name="img3" 
                                    />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img4" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 4') }}</label>
                            <div class="col-md-6">
                                <input id="img4" type="file" class="form-control-file" name="img4" 
                                    />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img5" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 5') }}</label>
                            <div class="col-md-6">
                                <input id="img5" type="file" class="form-control-file" name="img5" 
                                    />
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
