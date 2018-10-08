@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Сброс пароля</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Сбросить пароль
                                </button>
                            </div>
                        </div>

                    </form>
                        <div class="row">
                            <div class="col-xs-1 col-md-2"></div>
                            <div class="col-xs-10 col-md-8 DashboardLink">
                                <a href="/login" style="text-decoration: none;">
                                    <p class="text-center">Назад</p>
                                </a>
                                <div class="TextBar"></div>
                            </div>
                            <div class="col-xs-1 col-md-2"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
