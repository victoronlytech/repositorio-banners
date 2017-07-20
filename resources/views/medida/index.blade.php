@extends('layout.master')

@section('titulo', 'Index')
@section('conteudo')
    <div class="title-card">
        <h1><i class="material-icons">&#xE051;</i> Medidas</h1>
    </div>
    <div class="card-panel">
        <div class="">
            <a href="medidas/criar" class="btn-floating btn-large right blue"><i class="material-icons">add</i></a>
        </div>
        <br>
        <br>
        <table class="striped">
            <thead>
                <tr>
                    <th class="col s6 m6">Medida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medidas as $medida)
                    <tr>
                        <td>
                            {{$medida->altura}}x{{$medida->largura}}
                        </td>
                        <td>
                            <a href="medidas/editar/{{$medida->id}}" class="btn blue">Editar</a>
                            <a href="medidas/excluir/{{$medida->id}}" class="btn red">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="center pagination__default">
            {{ $medidas->links() }}
        </div>
    </div>
    @include('sweet::alert')
@endsection
