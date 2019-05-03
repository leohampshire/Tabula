@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

 @if ($errors->any())
  <div class="content-header">
    @foreach ($errors->all() as $error)
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $error }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endif

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
                    <label for="sex">Sexo</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="sex" value="m"> Masculino
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sex" value="f"> Feminino
                    </label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label for="country_id">País</label>
                    <select class="form-control" name="country_id">
                        <option value="" selected disabled hidden>Escolha</option>
                        @forelse($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label for="state_id">Estado</label>
                    <select class="form-control" name="state_id">
                        <option value="" selected disabled hidden>Escolha</option>
                        @forelse($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @empty
                        @endforelse
                    </select>
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
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Escolaridade</label>
                    <select name="schooling_id" class="form-control">
                        <option value="" selected disabled hidden>Escolha</option>
                        @forelse($schoolings as $schooling)
                        <option value="{{$schooling->id}}">{{$schooling->name}}</option>
                        @empty
                        @endforelse
                       
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Interesses</label>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Finanças e Economia
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Varejo e Consumo
                      </label>
                    </div>
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

@stop