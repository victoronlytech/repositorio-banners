@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    <form class="col s12" action="/campanhas/portais/linhascriativas/formatos/criar" method="post" id="form" data-toggle="validator" role="form">
        <div class="title-card">
            <h1><i class="material-icons">&#xE617;</i> Formato</h1>
        </div>
        @if(isset($errors) && count($errors) > 0)
            <div>
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
            </div>
        @endif
        <div class="card-panel">
            {!! csrf_field() !!}
            <div class="row">
                <div hidden class="col s6">
                    <input  name="id" value="{{ old('id',  isset($formato->id) ? $formato->id : null) }}">
                </div>
                <div hidden class="col s7">
                    <input  name="linhacriativa_id" value="{{$linhacriativa_id or $formato->linhacriativa_id}}">
                </div>
                <div class="col s6 m6">
                    <label for="textNome" class="validate">Nome</label>
                    <input id="textNome"  placeholder="Digite o nome..." type="text" name="nome" value="{{ old('nome',  isset($formato->nome) ? $formato->nome : null) }}">
                </div>
            </div>
            <div class="row" id="campo">
                <div class="col s12 m4">
                    <label>Medidas</label>
                    <select class="browser-default" name="medida_id">
                        <option disabled selected value="">Selecione</option>
                        @foreach($medidas as $medida)
                            <option {{ isset($formato->medida_id) && $medida->id == $formato->medida_id ? 'selected' : ''}} value="{{$medida->id}}">{{$medida->altura}}x{{$medida->largura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    <a href="/public/campanhas/portais/linhascriativas/formatos/{{$linhacriativa_id or $formato->linhacriativa_id}}">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
