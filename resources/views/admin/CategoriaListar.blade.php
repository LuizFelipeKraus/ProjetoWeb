@extends('layouts.app_tela_listas')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome da Categoria</th>
		<th>Categoria Pai</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lCategoriaProdutos as $uCategoria)	
	<tbody>
		<td>{{$uCategoria->id}}</td>
		<td>{{$uCategoria->nome}}</td>
		<td>{{$uCategoria->categoria_pai}}</td>        
		<td><a href="{{route('view_alterar_categoria', ['id' => $uCategoria->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="excluir({{$uCategoria->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('view_adicionar_categoria')}}" class="btn btn-primary btn-block">Nova Categoria</a>

<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o categoria de id: " + id + "?")) {
            location.href = route('deletar_categoria', {id : id});
        }
    }
</script>
@endsection