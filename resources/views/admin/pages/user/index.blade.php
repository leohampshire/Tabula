@extends('admin.templates.default')

@section('title', 'Usuários')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Usuários</h1>
        </div>
        <div class="col-sm-6">
          <button class="btn-header" onclick="window.location.href='{{ route('admin.user.create')}}'">Novo</button>
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
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
              <form id="filterForm" method="GET" autocomplete="off">
              <div class="box-header">
                <h3 class="box-title">Filtrar resultados</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="name">Nome do Usuário</label>
                    <input type="text" name="name" value="{{request('name')}}" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" value="{{request('email')}}" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <label for="user_type_id">Tipo de Usuário</label>
                    <select name="user_type_id" class="form-control"  id="user_type_id">
                      <option value="" selected disabled>Selecione..</option>
                      @foreach($user_type as $type)
                      <option value="{{$type->id}}" {{$type->id == request('user_type_id') ? "selected" : ""}}>{{$type->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <button type="submit" class="btn btn-default clear-filters">Limpar</button>
              </div>
            </form>
        </section>
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Usuários</h3>
              <div class="box-tools">
                <?php

                $paginate = $users;

                $link_limit = 7;

                $filters = '&name='.request('name');
                $filters = '&email='.request('email');
                $filters = '&user_type_id='.request('user_type_id');
                ?>
                @if($paginate->lastPage() > 1)
                  <ul class="pagination pagination-sm no-margin pull-right">
                      <li class="{{ ($paginate->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $paginate->url(1) . $filters}}">«</a>
                      </li>
                      @for($i = 1; $i <= $paginate->lastPage(); $i++)
                          <?php
                          $half_total_links = floor($link_limit / 2);
                          $from = $paginate->currentPage() - $half_total_links;
                          $to = $paginate->currentPage() + $half_total_links;
                          if ($paginate->currentPage() < $half_total_links) {
                             $to += $half_total_links - $paginate->currentPage();
                          }
                          if ($paginate->lastPage() - $paginate->currentPage() < $half_total_links) {
                              $from -= $half_total_links - ($paginate->lastPage() - $paginate->currentPage()) - 1;
                          }
                          ?>
                          @if ($from < $i && $i < $to)
                              <li class="{{ ($paginate->currentPage() == $i) ? ' active' : '' }}">
                                  <a href="{{ $paginate->url($i) . $filters}}">{{ $i }}</a>
                              </li>
                          @endif
                      @endfor
                      <li class="{{ ($paginate->currentPage() == $paginate->lastPage()) ? ' disabled' : '' }}">
                          <a href="{{ $paginate->url($paginate->lastPage()) . $filters}}">»</a>
                      </li>
                  </ul>
                @endif
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo de Usuário</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->userTypes->name}}</td>
                      <td>
                        <a href="{{ route('admin.user.edit', ['user' => $user->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="#" title="Alterar Senha" class="act-list act-password">
                          <i class="fa fa-key" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.user.delete',  ['id' => $user->id])}}" title="Excluir" class="act-list act-delete">
                          <i class="fa fa-trash" aria-hidden="true"></i>
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
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo de Usuário</th>
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


@section('modals')
<!--Alterar Senha-->
<div class="modal fade" id="passwordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Alterar Senha</h4>
            </div>
            <form method="POST" action="{{ route('admin.user.password', ['id' => $user->id])}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="password">Senha</label>
                                <input type="password" name="password" placeholder="Senha" class="form-control"
                                    id="password" >
                            </div>
                            <div class="col-xs-6">
                                <label for="desc">Confirmação de Senha</label>
                                <input type="password" name="password_confirmation" placeholder="Confirmação de Senha"
                                    class="form-control" id="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. Alterar senha -->
@endsection

@section('scripts')
<script type="text/javascript">
$('.act-password').on('click', function(e) {
    e.preventDefault();
    $('#passwordModal').modal('show');

})
</script>
@endsection