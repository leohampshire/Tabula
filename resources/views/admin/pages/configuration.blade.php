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
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="box-title">Dados da conta</h3>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn-header act-password">Alterar Senha</button>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.configuration.update') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $auth->id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $auth->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $auth->email }}" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </section>
            @if($auth->user_type_id == 1)
            <section class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Taxas Aplicadas</h3>
                    </div>
                    <form method="POST" action="{{ url('admin/configuracao/taxa') }}">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="taxa">Taxa a favor do Professor(%)</label>
                                <input type="number" name="taxa" max="100" class="form-control"
                                    value="{{ $taxa->taxa_users }}" required>

                            </div>
                            <div class="form-group">
                                <p>Valor recebido pelo professor (%): {{ $taxa->taxa_users }} %</p>
                                <p>Valor recebido pelo Tabula (%): {{ $taxa->taxa_tabula }} %</p>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </section>
            @endif
        </div>

        <!-- /.row (main row) -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="box-title">SEO Home</h3>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.seo.update') }}">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input class="form-control" id="meta_title" type="text" name="meta_title"
                                        placeholder="Meta Title" value="{{ $seo->meta_title }}">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="7"
                                        class="form-control">{{$seo->meta_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
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
            <form method="POST" action="{{route('admin.configuration.password')}}" enctype="multipart/form-data">
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