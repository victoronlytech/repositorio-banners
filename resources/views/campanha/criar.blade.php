@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    @if(isset($errors) && count($errors) > 0)
        <div>
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        </div>
    @endif
    <form action="/public/campanhas/criar" enctype="multipart/form-data" method="post" id="form" data-toggle="validator" role="form">
        <div class="title-card">
            <h1>Campanha</h1>
        </div>
        <div class="card-panel">
            {!! csrf_field() !!}
            <div hidden >
                <input  name="id" value="{{ old('id',  isset($campanha->id) ? $campanha->id : null) }}">
            </div>
            <div class="row">
                <div class="col s6 m6">
                    <label for="textNome" class="control-label">Nome</label>
                    <input id="textNome" placeholder="Digite o nome..." type="text" name="nome" value="{{ old('nome',  isset($campanha->nome) ? $campanha->nome : null) }}">
                </div>
                <div class="col s6 m6">
                    <label for="textDescricao" class="control-label">Descrição</label>
                    <textarea rows="4" cols="50" id="textDescricao" placeholder="Digite a descrição..." type="text" name="descricao">{{ old('nome',  isset($campanha->nome) ? $campanha->nome : null) }}</textarea>
                </div>
                <div class="file-field input-field col s6 m6">
                    <div class="btn">
                        <span>File</span>
                        <input name="imagem" type="file">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    <a href="/campanhas">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
