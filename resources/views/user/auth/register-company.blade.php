@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
    <div class="container">
        <div class="box-title">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Cadastre-se</h1>
                </div>
            </div>
        </div>
        <form action="{{route('user.register')}}" method="POST">
              {{csrf_field()}}
            <input type="hidden" name="user_type">
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Nome</label>
                    <input name="name" type="text" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label for="password">Senha</label>
                    <input name="password" type="password" class="form-control" placeholder="Senha">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label for="password_confirmation">Confirmação de senha</label>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmação de senha">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
