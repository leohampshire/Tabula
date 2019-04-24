@extends('admin.templates.default')

@section('title', 'Dashboard')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </section>

    @isset($_GET['alert'])
      <section class="content-header">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-sm-12">
            <div class="alert alert-{{$_GET['type-alert']}} alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{$_GET['alert']}}
            </div>
          </section>
        </div>
      </section>
    @endisset

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>10</h3>

              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>10</h3>

              <p>Produtos Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>10</h3>

              <p>Lotes cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>10</h3>

              <p>Total de pedidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pedidos recentes</h3>
            </div>
            <div class="box-body">
              <table id="tabela-com-filtro" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Valor sem descontos</th>
                    <th>Valor Final</th>
                    <th>Status</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $orders = array(); ?>
                  @forelse($orders as $order)
                  <tr>
                    <td>{{$order->date}}</td>
                    <td>{{$order->customer->company_name}}</td>
                    <td>R$ {{number_format($order->total_order, 2, ',', '.')}}</td>
                    <td>R$ {{number_format($order->subtotal, 2, ',', '.')}}</td>
                    <td>{{$order->statusOrder($order->id)}}</td>
                    <td>
                      @if($order->statusOrder($order->id) == 'Em aberto')
                        <a href="{{ route('admin.order.create', ['id' => $order->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @elseif($order->statusOrder($order->id) == 'Aguardando Pagamento' )
                        <a href="{{ route('admin.order.finish', ['id' => $order->id])}}" title="Editar" >
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @else
                        <a href="{{ route('admin.order.show', ['id' => $order->id])}}" title="Visualizar" >
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($order->statusOrder($order->id) == 'Em aberto' || $order->statusOrder($order->id) == 'Aguardando Pagamento' )
                         <a href="{{ route('admin.order.destroy', ['id' => $order->id])}}" title="Excluir" class="act-list act-delete">
                          <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                        </a>
                        @endif
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
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Valor sem descontos</th>
                    <th>Valor Final</th>
                    <th>Status</th>
                    <th>Ação</th>
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