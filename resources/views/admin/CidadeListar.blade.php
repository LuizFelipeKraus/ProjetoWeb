@extends('layouts.app_tela_listas')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Cidade</th>
		<th>Estado</th>
        <th>Sigla</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lCidade as $uCidade)	
	<tbody>
		<td>{{$uCidade->id}}</td>
		<td>{{$uCidade->nome}}</td>
		<td>{{$uCidade->estado->nome}}</td>
        <td>{{$uCidade->estado->sigla}}</td>
		<td><a href="{{route('view_alterar_cidade', ["id" => $uCidade->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="excluir({{$uCidade->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('view_adicionar_cidade')}}" class="btn btn-primary btn-block">Nova Cidade</a>

<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o cidade de id: " + id + "?")) {
            location.href = route('deletar_cidade', {id : id});
        }
    }
</script>
@endsection