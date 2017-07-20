@extends('layout.master')
@section('titulo', 'Portais')
@if(isset($campanha_id))
    @section('portal'){{$campanha_id}}@endsection
@endif
{{-- @section('portal'){{$campanha_id}}@endsection --}}
@section('conteudo')
    <section class="title__page">
        <div class="title__page--left">
            <h3>@yield('titulo')</h3>
            <br>
        </div>
        <div class="title__page--right">
            @if(Auth::user()->id === 1)
                @if(isset($campanha_id))
                    <a href="addportal/{{$campanha_id}}" class="btn btn-primary btn-round"><i class="material-icons">add_circle_outline</i> Adicionar</a>
                @else
                    <a href="portais/criar" class="btn btn-primary btn-round"><i class="material-icons">add_circle_outline</i> Adicionar</a>
                @endif
            @endif
        </div>
    </section>
    <div class="row row-flex">
        @foreach($portais as $portal)
            {{-- <td>
                <a href="editar/{{$portal->id}}" class="btn blue">Editar</a>
                <a href="excluir/{{$portal->id}}" class="btn red">Excluir</a>
                @if(isset($campanha_id))
                    <a href="linhascriativas/listar/{{$campanha_id}}/{{$portal->id}}" class="btn">Linhas Criativas</a>
                @endif    
            </td> --}}
            <div class="col-md-3">
                <div class="card card-product">
                    <div class="card-image" data-header-animation="false">
                        @if(isset($campanha_id))
                        <a href="linhascriativas/listar/{{$campanha_id}}/{{$portal->id}}" class="_card-image-link">
                            <img class="img" src="{{asset('imagens/'.$portal->imagem)}}">
                        </a>
                        @else
                            <img class="img" src="{{asset('imagens/'.$portal->imagem)}}">
                        @endif
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            @if(isset($campanha_id))
                                <a href="linhascriativas/listar/{{$campanha_id}}/{{$portal->id}}">{{$portal->nome}}</a>
                            @else
                                {{$portal->nome}}
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('sweet::alert')
@endsection
