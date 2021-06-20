@extends('layouts.app_tela_listas')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome da Plataforma</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lPlataforma as $uPlataforma)	
	<tbody>
		<td>{{$uPlataforma->id}}</td>
		<td>{{$uPlataforma->nome}}</td>     
		<td><a href="{{route('view_alterar_plataforma', ['id' => $uPlataforma->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="excluir({{$uPlataforma->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('view_adicionar_plataforma')}}" class="btn btn-primary btn-block">Nova Plataforma</a>

<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o plataforma de id: " + id + "?")) {
            location.href = route('deletar_plataforma', {id : id});
        }
    }
</script>
@endsection