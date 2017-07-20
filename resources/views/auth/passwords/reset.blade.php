@extends('layout.login')

@section('conteudo')
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <div class="card card-login card-hidden">
        <input type="hidden" name="token" value="{{ $token }}">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header text-center" data-background-color="rose">
            <h4 class="card-title">Resetar senha</h4>
        </div>
        <div class="card-content">
            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                        <i class="material-icons">mail</i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label" for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                </div>
            </div>
            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">lock_outline</i>
                </span>
                <div class="form-group label-floating">
                    <label for="password"  class="control-label">Senha</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">lock_outline</i>
                </span>
                <div class="form-group label-floating">
                    <label for="password-confirm"  class="control-label">Confirma senha</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
        </div>
        <div class="footer text-center">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Login</button>
            <a style="display:block;margin:0 auto;text-align:center" href="{{ route('password.request') }}">Esqueci senha</a>
        </div>
    </div>
</form>
@endsection
