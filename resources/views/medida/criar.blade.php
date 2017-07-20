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
    <form action="/public/medidas/criar" method="post" id="form" data-toggle="validator" role="form">
        <div class="title-card">
            <h1>Medida</h1>
        </div>
        <div class="card-panel">
            {!! csrf_field() !!}
            <div hidden>
                <input  name="id" value="{{ old('id',  isset($medida->id) ? $medida->id : null) }}">
            </div>
            <div class="row">
                <div class="col s2 m2">
                    <label for="textAltura" class="control-label">Altura</label>
                    <input id="textAltura" placeholder="Digite a altura..." type="number" name="altura" value="{{ old('altura',  isset($medida->altura) ? $medida->altura : null) }}">
                </div>
                <div class="col s2 m2">
                    <label for="textLargura" class="control-label">Largura</label>
                    <input id="textLargura" placeholder="Digite a largura..." type="number" name="largura" value="{{ old('largura',  isset($medida->largura) ? $medida->largura : null) }}">
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    <a href="/public/medidas">voltar</a>
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
