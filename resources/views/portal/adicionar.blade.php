@extends('layout.master')

@section('titulo', 'Criar')

@section('conteudo')
    <form class="col s12" action="/campanhas/portais/addportal" method="post" id="form" data-toggle="validator" role="form">
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
                    <input  name="id" value="{{ old('id',  isset($campanha_portal->id) ? $campanha_campanha_portal->id : null) }}">
                    <input  name="campanha_id" value="{{ old('id',  isset($campanha_id) ? $campanha_id : null) }}">
                </div>
            </div>
            <div class="row" id="campo">
                <div class="col s12 m4">
                    <label>Portais</label><br>
                    @foreach($portais as $portal)
                        <input type="checkbox" name="portal_id[]" value="{{$portal->id}}"> {{$portal->nome}} <br>
                        {{-- <option {{ isset($formato->medida_id) && $medida->id == $formato->medida_id ? 'selected' : ''}} value="{{$medida->id}}">{{$medida->altura}}x{{$medida->largura}}</option> --}}
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10">
                    {{-- <a href="/public/campanhas/portais/linhascriativas/formatos/{{$linhacriativa_id or $formato->linhacriativa_id}}">voltar</a> --}}
                </div>
                <div class="col s1 m1">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
