@extends('layouts.app_tela_listas')
@routes
@section('content')
<table class="table table-bordered  table-dark table-striped mt-4">
    <thead>    
        <th colspan="3" class="text-center" >Tabela de Admin do Site</th>
    </thead>
    <thead>        
		<th>ID</th>
		<th>Nome</th>
		<th>E-mail</th>		
	</thead>
	@foreach($lAuth as $uAuth)	
    @if($uAuth->permissao == 1)
	<tbody>
		<td>{{$uAuth->id}}</td>
		<td>{{$uAuth->name}}</td>
		<td>{{$uAuth->email}}</td>
		
	</tbody>
    @endif
	@endforeach
    
</table>
<table class="table table-bordered  table-dark table-striped mt-4" widh="100%">
    <thead>    
        <th colspan="9" class="text-center" >Tabela de Clientes do Site</th>
    </thead>
    <thead>
		<th>ID</th>
		<th>Nome</th>
		<th>E-mail</th>
        <th>CPF</th>
        <th>RG</th>
        <th>Telefone</th> 
        <th>Data de Nascimento</th>
        <th>Permissão Admin</th>
        <th>Excluir</th> 

	</thead>
	@foreach($lAuth as $uAuth)	
    @if($uAuth->permissao == 0)
	<tbody>
		<td>{{$uAuth->id}}</td>
		<td>{{$uAuth->name}}</td>
		<td>{{$uAuth->email}}</td>
        <td>{{$uAuth->cpf}}</td>
        <td>{{$uAuth->rg}}</td>
        <td>{{$uAuth->telefone}}</td> 
        <td>{{$uAuth->data_nascimento}}</td> 
        <td><a href="#" onclick="permissao({{$uAuth->id}})" class="btn btn-warning btn-block">Permissão</a></td>          
		<td><a href="#" onclick="excluir({{$uAuth->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
    @endif
	@endforeach    
 
</table>
<script>
    function excluir(id) {
        if (confirm("Deseja realmente excluir o categoria de id: " + id + "?")) {
            location.href = route('deletar_categoria', {id : id});
        }
    }
    function permissao(id){
        if (confirm("Deseja realmente dar permissão para id: " + id + "?")) {
            location.href = route('permissao_usuario', {id : id});
        }
    }
</script>
@endsection