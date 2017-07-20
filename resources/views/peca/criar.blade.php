@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    <form action="/campanhas/portais/linhascriativas/formatos/pecas/criar" enctype="multipart/form-data" method="post" id="form" data-toggle="validator" role="form">
        <div class="title-card">
            <h1>Peça</h1>
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
            <div hidden>
                <input name="id" value="{{ old('id',  isset($campanha->id) ? $campanha->id : null) }}">
            </div>
            <div hidden>
                <input name="formato_id" value="{{ old('formato_id',  isset($formato_id) ? $formato_id : null) }}">
            </div>
            <div hidden>
                <input name="nome_original" value="">
            </div>
            <div hidden>
                <input name="pasta" value="">
            </div>
            <div class="row">
                <div class="col s6 m6">
                    <label for="textNome" class="control-label">Nome</label>
                    <input id="textNome"  placeholder="Digite o nome..." type="text" name="nome" value="{{ old('nome',  isset($campanha->nome) ? $campanha->nome : null) }}">
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s6 m6">
                    <div class="btn">
                        <span>File</span>
                        <input name="arquivo" type="file">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    <a href="/campanhas/portais/linhascriativas/formatos/pecas/{{$formato_id}}">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
