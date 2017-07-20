@extends('layout.master')

@section('titulo', 'Linhas Criativas')
@section('portal'){{$campanha_id}}@endsection
@section('linhacriativa'){{$campanha_id}}/{{$portal_id}}@endsection
@section('conteudo')
    <section class="title__page">
        <div class="title__page--left">
            <h3>@yield('titulo')</h3>
            <br>
        </div>
        <div class="title__page--right">
            @if(Auth::user()->id === 1)
                <a href="/campanhas/portais/linhascriativas/criar/{{$campanha_id}}/{{$portal_id}}" class="btn btn-primary btn-round"><i class="material-icons">add_circle_outline</i> Adicionar</a>
            @endif
        </div>
    </section>
    <div class="row row-flex">
        @foreach($linhacriativas as $linhacriativa)
            {{-- <tr>
                <td>
                    {{$linhacriativa->nome}}
                </td>
                <td>
                    <a href="/campanhas/portais/linhascriativas/editar/{{$linhacriativa->id}}" class="btn blue">Editar</a>
                    <a href="/campanhas/portais/linhascriativas/excluir/{{$linhacriativa->id}}" class="btn red">Excluir</a>
                    <a href="/campanhas/portais/linhascriativas/formatos/{{$linhacriativa->id}}" class="btn">Formatos</a>
                </td>
            </tr> --}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">{{$linhacriativa->nome}}</h4>
                    <div class="">
                        <a href="/campanhas/portais/linhascriativas/formatos/criar/{{$linhacriativa->id}}" class="btn-floating btn-large right blue"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th></th>
                                    <th>Formato</th>
                                    <th>Tipo</th>
                                    <th>Tamanho</th>
                                    <th colspan="2" class="text-right">link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($linhacriativa->formatos as $formato)
                                    <tr>
                                        <td class="text-center">{{$formato->id}}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="optionsCheckboxes">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$formato->nome}}</td>
                                        <td>simples</td>
                                        <td>253kb</td>
                                        <td colspan="2" class="text-right"><a href="/campanhas/portais/linhascriativas/formatos/pecas/{{$formato->id}}" class="btn btn-info btn-sm">Acessar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>



    {{-- <div class="title-card">
        <h1>Linhas Criativas</h1>
    </div>
    <div class="card-panel">
        <div class="">
            <a href="/campanhas/portais/linhascriativas/criar/{{$campanha_id}}/{{$portal_id}}" class="btn-floating btn-large right blue"><i class="material-icons">add</i></a>
        </div>
        <br>
        <br>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($linhacriativas as $linhacriativa)
                    <tr>
                        <td>
                            {{$linhacriativa->nome}}
                        </td>
                        <td>
                            <a href="/campanhas/portais/linhascriativas/editar/{{$linhacriativa->id}}" class="btn blue">Editar</a>
                            <a href="/campanhas/portais/linhascriativas/excluir/{{$linhacriativa->id}}" class="btn red">Excluir</a>
                            <a href="/campanhas/portais/linhascriativas/formatos/{{$linhacriativa->id}}" class="btn">Formatos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="center">
            {{ $linhacriativas->links() }}
        </div>
        <br>
        <br>
        <a href="/public/campanhas/portais/{{$campanha_id}}">Voltar</a>
    </div> --}}
    @include('sweet::alert')
@endsection
