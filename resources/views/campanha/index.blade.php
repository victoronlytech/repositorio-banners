@extends('layout.master')

@section('titulo', 'Campanhas')
@section('conteudo')

<section class="title__page">
    <div class="title__page--left">
        <h3>@yield('titulo')</h3>
        <br>
    </div>
    <div class="title__page--right">
        @if(Auth::user()->id === 1)
            <a href="campanhas/criar" class="btn btn-primary btn-round">
    	        <i class="material-icons">add_circle_outline</i> Adicionar
            </a>
        @endif
    </div>
</section>
<div class="row row-flex">
@foreach($campanhas as $campanha)
    <div class="col-md-4">
        <div class="card card-product">
            @if(Auth::user()->id === 1)
                <div class="card-image" data-header-animation="true">
            @else
                <div class="card-image" data-header-animation="false">
            @endif
                <a href="campanhas/portais/{{$campanha->id}}" class="_card-image-link">
                    <img class="img" src="{{asset('imagens/'.$campanha->imagem)}}">
                </a>
            </div>
            <div class="card-content">
                @if(Auth::user()->id === 1)
                    <div class="card-actions">
                        
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Ver">
                            <i class="material-icons">art_track</i>
                        </button>
                        <a href="campanhas/editar/{{$campanha->id}}">
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger btn-simple excluir{{$campanha->id}}" rel="tooltip" data-placement="bottom" title="Remover">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                @endif
                <h4 class="card-title">
                    <a href="campanhas/portais/{{$campanha->id}}">{{$campanha->nome}}</a>
                </h4>
                <div class="card-description">
                    {{$campanha->descricao}}
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>Fazendo</h4>
                </div>
                <div class="stats pull-right">
                    <p class="category"><i class="material-icons">date_range</i> 25/03/2017</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
    @include('sweet::alert')
        {{-- <script>
        $('.excluir').click(function(){
            var id = $(this).data('id');
            swal({
                title: "Você tem certeza?",
                text: "Você não poderá recuperar este arquivo!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, excluir!",
                closeOnConfirm: false
                },
            function(isConfirm){
                if(isConfirm){
                    //$('.excluir'+id).trigger('click');
                    return true;
                }
                else{
                    return false;
                }
            });
            return false;
        }); 
        </script> --}}
@endsection
