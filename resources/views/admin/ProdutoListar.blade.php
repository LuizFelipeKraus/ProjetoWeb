@extends('layouts.app_tela_listas')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome do Produto</th>
		<th>Quantidade</th>
        <th>Valor</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lProdutos  as $uProduto)	
	<tbody>
		<td>{{$uProduto->id}}</td>
		<td>{{$uProduto->nome}}</td>
		<td>{{$uProduto->quantidade}}</td> 
        <td>{{$uProduto->valor}}</td>              
		<td><a href="{{route('view_alterar_produto', ['id' => $uProduto->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="excluir({{$uProduto->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('view_adicionar_produto')}}" class="btn btn-primary btn-block">Novo Produto</a>

<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o produto de id: " + id + "?")) {
            location.href = route('deletar_produto', {id : id});
        }
    }
</script>
@endsection