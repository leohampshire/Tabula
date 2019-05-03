@extends('admin.templates.default')

@section('title', 'Adicionar Administrador')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Administrador</h1>
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
        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.admin.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12 userType">
                    <label for="user_type_id">Tipo de Administrador: </label>
                    <select name="user_type_id" class="form-control">
                      <option value="" selected disabled hidden>Escolha um...</option>
                      @foreach ($userTypes as $userType)
                        <option value="{{ $userType->id }}"> {{ $userType->name }} </option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome Completo</label>
                    <input class="form-control" name="name" type="text" placeholder="Seu nome" value="{{ old('name') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ old('email') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="password">Senha</label>
                    <input class="form-control"  type="password" placeholder="Sua senha" name="password">
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.admin.index')}}">
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