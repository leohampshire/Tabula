@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
    <div class="container">
        <div class="box-title">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Login</h1>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ url('/company/login') }}">
              {{csrf_field()}}
            
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>E-mail</label>
                    <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Senha</label>
                    <input name="password" type="password" class="form-control" placeholder="Senha">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Lembrar-me
                      </label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <button class="btn-block" type="submit">Entrar</button>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-2">
                    <button class="btn-block btn-login-facebook" type="button">
                        <i class="fa fa-facebook" aria-hidden="true"></i> Facebook
                    </button>
                </div>
                <div class="col-sm-2">
                    <button class="btn-block btn-login-google" type="button">
                        <i class="fa fa-google" aria-hidden="true"></i> Google
                    </button>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="#" class="btn-forgot-password">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
