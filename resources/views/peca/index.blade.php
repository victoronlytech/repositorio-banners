@extends('layout.master')

@section('titulo', 'Peça')

@section('portal'){{$campanha_id}}@endsection
@section('linhacriativa'){{$campanha_id}}/{{$portal_id}}@endsection
@section('peca'){{$formato_id}}@endsection

@section('titulo', 'Index')
@section('conteudo')
    <section class="title__page">
        <div class="title__page--left">
            <h3>@yield('titulo')</h3>
            <br>
        </div>
        <div class="title__page--right">
            @if(Auth::user()->id === 1)
                <a href="criar/{{$formato_id}}" class="btn btn-primary btn-round"><i class="material-icons">add_circle_outline</i> Adicionar</a>
            @endif
        </div>
    </section>
    <div class="row row-flex">
        <!-- // loop campanhas -->
        @foreach($pecas as $peca)
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">cached</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">{{$peca->created_at}}<br></h4>
                        {{-- <h4 class="card-title">25 de junho 2017 - 23:00:00<br></h4> --}}
                        <a href="/banners/{{$peca->pasta}}/{{$peca->nome_original}}/index.html" target="_blank">
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">web</i> Visualizar
                            </button>
                        </a>
                        <a target="_blank" href="/banners/{{$peca->pasta}}/{{$peca->arquivo}}" download="{{$peca->nome_original}}">
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">cloud_download</i> Baixar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{-- <div class="card-panel">
        <div class="">
            <a href="criar/{{$formato_id}}" class="btn-floating btn-large right blue"><i class="material-icons">add</i></a>
        </div>
        <br>
        <br>
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($pecas as $peca)
                    <tr>
                        <td>
                            {{$peca->nome}}
                        </td>
                        <td>
                            {{$peca->created_at}}
                        </td>
                        <td>
                            <a href="excluir/{{$peca->id}}" class="btn red">Excluir</a>
                            <a target="_blank" href="/storage/app/{{$peca->arquivo}}" download="{{$peca->nome_original}}" class="btn blue">Download</a>
                            <a href="/storage/app/{{$peca->pasta}}/{{$peca->nome_original}}" target="_blank" class="btn btn-primary btn-sm">Visualizar</a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="center">
            {{ $pecas->links() }}
        </div>
        <br>
        <br>
        <a href="/public/campanhas/portais/linhascriativas/formatos/{{$linhacriativa_id}}">Voltar</a>
    </div> --}}
    @include('sweet::alert')
@endsection
