@extends('admin.templates.default')

@section('title', 'Mensagem')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Mensagem</h1>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
              <div class="box-body">
                <div class="form-group row">
                    <div class="col-xs-12">
                        <h3>Tipo de Mensagem:</h3>
                        <h4>{{$notification->type_notification}}</h4>
                    </div>
                  <div class="col-xs-12">
                    <h3>Mensagem:</h3>
                    <h4>{{$notification->desc_notification}}</h4>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="{{route('admin.notification.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
          </div>
        </section>
        
      </section>
      <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

  </div>

@stop