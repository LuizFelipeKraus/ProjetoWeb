@extends('layouts.app')

@section('content')

<div class="container px-4 px-lg-5">
    @if(isset($produn))
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            @if(isset($produn->fotoProduto->first()->nome_arquivo))
                <img class="img-fluid rounded mb-4 mb-lg-0" width="900" height="400"
                src="{{url($produn->fotoProduto->first()->nome_arquivo)}}" alt="..." /></div>
            @endif
        <div class="col-lg-5">
            <h1 class="font-weight-light text-light">{{$produn->nome}}</h1>
            <p class="text-light">{{$produn->descricao}}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-center">
                <a href="{{ route('view_unitario_produtos', ['produto'=>$produn]) }}"
                    class="btn btn-success me-md-2" type="button">Comprar</a>
            </div>
        </div>
    </div>
    @endif
    <div class="row gx-5">
        @foreach($ps as $p)
        <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
                @if(isset($p->fotoProduto->first()->nome_arquivo))
                <img src="{{url($p->fotoProduto->first()->nome_arquivo)}}" class="card-img-top" alt="..." width="480"
                    height="350" />
                @endif

                <div class="card-body p-4">
                    <a  href="{{ route('view_unitario_produtos', ['produto'=>$p->id]) }}" class="text-decoration-none link-dark stretched-link" href="#!">
                        <h5 class="card-title mb-3">{{$p->nome}}</h5>
                    </a>
                    <p class="card-text mb-0">{{$p->descricao}}</p>
                </div>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <a 
                                    class="btn btn-success me-md-2" type="button">Comprar
                                </a>
                                
                            </div>
                           
                        </div>
                           
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
