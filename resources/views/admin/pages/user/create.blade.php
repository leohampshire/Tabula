@extends('admin.templates.default')

@section('title', 'Adicionar Usuário')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Usuário</h1>
        </div>
      </div>
    </section>

    @if(session()->has('success'))
      <section class="content-header">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('success')}}
            </div>
          </section>
        </div>
      </section>
    @endisset

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

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-4 userType">
                    <label for="user_type_id">Tipo de usuário: </label>
                    <select name="user_type_id" class="form-control">
                      <option value="" selected disabled hidden>Escolha um...</option>
                      @foreach ($userTypes as $userType)
                        <option @if(old('user_type_id') == $userType->id) selected @endif value="{{ $userType->id }}"> {{ $userType->name }} </option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label for="country">País</label>
                    <select id="country" name="country_id" class="form-control">
                      <option value="" selected disabled hidden>Escolha um...</option>
                      @foreach ($countries as $country)
                        <option @if(old('country_id') == $country->id) selected @endif value="{{ $country->id }}"> {{ $country->name }} </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-xs-4">
                    <div class="state">
                      <label for="state">Estado</label>
                      <select id="state" name="state_id" class="form-control">
                        <option selected disabled hidden>Escolha um...</option>
                        @foreach ($states as $state)
                          <option @if(old('state_id') == $state->id) selected @endif value="{{ $state->id }}"> {{ $state->name }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                      <label for="name">Nome Completo</label>
                      <input class="form-control" name="name" type="text" placeholder="Seu nome" value="{{ old('name') }}">
                    </div>
                  
                  <div class="col-xs-6">
                    <label for="password">Senha</label>
                    <input class="form-control"  type="password" placeholder="Sua senha" name="password">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ old('email') }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="birthdate">Data de Nascimento</label>
                    <input class="form-control input-date" type="text" name="birthdate" placeholder="DD/MM/AAAA" value="{{ old('birthdate') }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 sex">
                    <label for="sex">Sexo: </label>
                    <label class="radio-inline"><input type="radio" name="sex" @if(old('sex') == 'Masculino') checked @endif value="Masculino">Masculino</label>
                    <label class="radio-inline"><input type="radio" name="sex" @if(old('sex') == 'Feminino') checked @endif value="Feminino">Feminino</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="linkedin">Linkedin</label>
                    <input class="form-control" type="text" name="linkedin" placeholder="https://..." value="{{ old('linkedin') }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="website">Website</label>
                    <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ old('website') }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="google_plus">Google +</label>
                    <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ old('google_plus') }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="twitter">Twitter</label>
                    <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ old('twitter') }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="facebook">Facebook</label>
                    <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ old('facebook') }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="youtube">Youtube</label>
                    <input class="form-control" type="text" name="youtube" placeholder="https://..." value="{{ old('youtube') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="schooling">Escolaridade</label>
                  <select id="schooling" name="schooling_id" class="form-control">
                    <option value="" selected disabled hidden>Escolha uma...</option>
                    @foreach ($schoolings as $schooling)
                      <option value="{{ $schooling->id }}"> {{ $schooling->name }} </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="bio">Conte-nos um pouco sobre você:</label>
                    <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ old('bio') }}</textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.user.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop