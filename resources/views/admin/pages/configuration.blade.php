@extends('admin.templates.default')

@section('title', 'Configurações')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Configurações</h1>
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

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados da conta</h3>
            </div>
            <form method="POST" action="{{ route('admin.configuration.update') }}">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{ $auth->id }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ $auth->name }}" required>
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" name="email" class="form-control" id="email" value="{{ $auth->email }}" required>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
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