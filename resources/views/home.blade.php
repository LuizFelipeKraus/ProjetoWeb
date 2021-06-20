@extends('layouts.app')

@section('content')
@foreach($ps as $p)
	<div class="col-md-3 mb-2 ">
		<div class="col-md-12 card {{ (!$loop->first ? 'ml-2': '') }}">
			@if(isset($p->fotoProduto->first()->nome_arquivo))
            	<img src="{{url($p->fotoProduto->first()->nome_arquivo)}}" class="card-img-top img-fluid" alt="..." width="100" height="200" />
            @endif
		  <div class="card-body">
		    <h5 class="card-title">{{ $p->nome }}</h5>
		    <p class="card-text">{{ $p->valor_unitario }}</p>
		    <a href="{{ route('view_unitario_produto', ['produto'=>$p]) }}" class="btn btn-primary w-100">Detalhes produtos</a>
		  </div>
		</div>
	</div>
	@endforeach
@endsection
