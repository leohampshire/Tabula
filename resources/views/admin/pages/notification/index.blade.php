@extends('admin.templates.default')

@section('title', 'Notificações')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Notificações</h1>
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
              <h3 class="box-title">Lista de Notificações</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tipo de Notificação</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($notifications as $notification)
                    <tr>
                      <td>{{$notification->type_notification}}</td>
                      <td>{{substr($notification->desc_notification,0,50)}}...</td>
                      <td>{{$notification->created_at}} </td>
                      <td>
                        <a href="{{route('admin.notification.show', ['id' => $notification->id])}}" title="Visualizar" class="act-list">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        @if($notification->status == 1)
                          <a href="{{route('admin.notification.status', ['id' => $notification->id])}}" title="Marcar como lida" class="act-list">
                          <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                          </a>
                        @else
                          <a href="{{route('admin.notification.status', ['id' => $notification->id])}}" title="Marcar como não lida" class="act-list">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          </a>
                        @endif
                        <a href="#" title="Visualizar" data-id="{{$notification->id}}" class="act-list act-increase">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Tipo de Notificação</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                  </tr>
                </tfoot>   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop