@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Plataforma') }}</div>
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
                    <form method="POST" action="{{ route('adicionar_plataforma') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required autocomplete="nome" autofocus />

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