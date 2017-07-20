@extends('layout.login')

@section('conteudo')
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="card card-login card-hidden">
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
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
        </div>
        <div class="footer text-center">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Enviar</button>
        </div>
    </div>
</form>
@endsection
