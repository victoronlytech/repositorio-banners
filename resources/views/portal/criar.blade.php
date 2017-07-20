@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    <form action="/public/portais/criar" method="post" id="form" enctype="multipart/form-data" data-toggle="validator" role="form">
        <div class="title-card">
            <h1>Portal</h1>
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
                <div hidden >
                    <input  name="id" value="{{ old('id',  isset($portal->id) ? $portal->id : null) }}">
                </div>
                <div class="col s6 m6">
                    <label for="textNome" >Nome*</label>
                    <input id="textNome"  placeholder="Digite o nome..." type="text" name="nome" value="{{ old('nome',  isset($portal->nome) ? $portal->nome : null) }}">
                </div>
                <div class="col s6 m6">
                    <label for="textDescricao" >Descrição</label>
                    <textarea rows="4" cols="50" id="textDescricao" placeholder="Digite a descrição..." type="text" name="descricao">{{ old('nome',  isset($portal->descricao) ? $portal->descricao : null) }}</textarea>
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
                    <a href="/public/portais">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
