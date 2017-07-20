@extends('layout.login')

@section('conteudo')
    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="card card-login card-hidden">
        <div class="card-header text-center" data-background-color="rose">
            <h4 class="card-title">Registrar</h4>
        </div>
        <div class="card-content">
            <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                        <i class="material-icons">perm_identity</i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label" for="name">Nome</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                        <i class="material-icons">email</i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label" for="email">E-mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                        <i class="material-icons">vpn_key</i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label" for="password">Senha</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                        <i class="material-icons">vpn_key</i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label" for="password-confirm">Confirma senha</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
        </div>
        <div class="footer text-center">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Registrar</button>
        </div>
    </div>
</form>
@endsection
