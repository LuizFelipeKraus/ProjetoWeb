@extends('layouts.app')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome</th>
		<th>Estado</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lEstado as $uEstado)	
	<tbody>
		<td>{{$uEstado->id}}</td>
		<td>{{$uEstado->nome}}</td>
		<td>{{$uEstado->sigla}}</td>
		<td><a href="{{route('view_alterar_estado', ["id" => $uEstado->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="excluir({{$uEstado->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('view_adicionar_estado')}}" class="btn btn-primary btn-block">Nova Cidade</a>

<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o estado de id: " + id + "?")) {
            location.href = route('deletar_estado', {id : id});
        }
    }
</script>
@endsection