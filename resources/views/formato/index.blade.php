@extends('layout.master')

@section('titulo', 'Index')
@section('portal'){{$campanha_id}}@endsection
@section('linhacriativa'){{$portal_id}}@endsection
@section('formato'){{$linhacriativa_id}}@endsection

@section('titulo', 'Index')
@section('conteudo')
    <div class="title-card">
        <h1>Formatos</h1>
    </div>
    <div class="card-panel">
        <div class="">
            <a href="criar/{{$linhacriativa_id}}" class="btn-floating btn-large right blue"><i class="material-icons">add</i></a>
        </div>
        <br>
        <br>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Medida</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formatos as $formato)
                    <tr>
                        <td>
                            {{$formato->nome}}
                        </td>
                        <td>
                            {{$formato->Medida->altura}}x{{$formato->Medida->largura}}
                        </td>
                        <td>
                            <a href="editar/{{$formato->id}}" class="btn blue">Editar</a>
                            <a href="excluir/{{$formato->id}}" class="btn red">Excluir</a>
                            <a href="pecas/{{$formato->id}}" class="btn">Peça</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="center">
            {{ $formatos->links() }}
        </div>
        <br>
        <br>
        <a href="/public/campanhas/portais/linhascriativas/{{$portal_id}}">Voltar</a>
    </div>
    @include('sweet::alert')
@endsection
