@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    <form class="col s12" action="/campanhas/portais/linhascriativas/criar" method="post" id="form" data-toggle="validator" role="form">
        <div class="title-card">
            <h1><i class="material-icons">&#xE617;</i> Linha Criativa</h1>
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
                    <input  name="id" value="{{ old('id',  isset($linhacriativa->id) ? $linhacriativa->id : null) }}">
                    <input  name="campanha_id" value="{{$campanha_id or $linhacriativa->campanha_id}}">
                    <input  name="portal_id" value="{{$portal_id or $linhacriativa->portal_id}}">
                </div>

                <div class="col s6 m6">
                    <label for="textNome" class="validate">Nome</label>
                    <input id="textNome"  placeholder="Digite o nome..." type="text" name="nome" value="{{ old('nome',  isset($linhacriativa->nome) ? $linhacriativa->nome : null) }}">
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    <a href="/public/campanhas/portais/linhascriativas/{{$portal_id or $linhacriativa->portal_id}}">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
