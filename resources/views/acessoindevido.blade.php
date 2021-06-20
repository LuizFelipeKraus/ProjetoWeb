@extends('layouts.app')

@section('content')
    <h1 class="alert alert-danger">
        Você entrou em um mundo proibido !!
        <a href="{{route('home')}}" class="btn btn-danger ">Voltar</a>
    </h1>

@endsection