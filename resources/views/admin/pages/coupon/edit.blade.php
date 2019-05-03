@extends('admin.templates.default')

@section('title', 'Editar Cupom')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Cupom</h1>
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
            <form method="POST" action="{{route('admin.coupon.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$coupon->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="type_coupon">Tipo Cupom</label>
                    <select class="form-control" id="type_coupon" name="type_coupon">
                      <option selected disabled hidden>Escolha uma...</option>
                      <option value="porcentagem" <?php if ($coupon->type_coupon == 'porcentagem') echo "selected"; ?>>Desconto Porcentagem</option>
                      <option value="carrinho" <?php if ($coupon->type_coupon == 'carrinho') echo "selected"; ?>>Desconto  fixo de carrinho</option>
                      <option value="produto" <?php if ($coupon->type_coupon == 'produto') echo "selected"; ?>>Desconto fixo de produto</option>
                      <option value="macrotema" <?php if ($coupon->type_coupon == 'macrotema') echo "selected"; ?>>Desconto fixo de Macrotema</option>
                      <option value="subcategoria" <?php if ($coupon->type_coupon == 'subcategoria') echo "selected"; ?>>Desconto fixo de Subcategoria</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="cod_coupon">Código Cupom</label>
                    <input class="form-control" type="text" name="cod_coupon" placeholder="Código Cupom" value="{{ $coupon->cod_coupon }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc_coupon">Descrição Cupom</label>
                    <input class="form-control" name="desc_coupon" type="text" placeholder="Descrição Cupom" value="{{ $coupon->desc_coupon }}">
                  </div>
                </div>   

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="value_coupon">Valor Cupom</label>
                    <input class="form-control input-money" type="text" id="value_coupon" name="value_coupon" placeholder="Valor Cupom" value="{{ $coupon->value_coupon }}">
                  </div>
                  <div class="col-xs-6 course">
                    <label for="type_id">Curso</label>
                    <select class="form-control multiple select2" style='width: 400px;' name="type_id[]"  multiple="multiple">
                      <option value='0'>- Digite o Curso -</option>
                      @if($coupon->type_coupon == 'produto')
                      @foreach($coupon->type_id as $type_id)
                        <option value="{{$type_id}}" selected>{{$courseCoupons->find($type_id)->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="col-xs-6 macrotema">
                    <label for="type_id">Macrotema</label>
                    <select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
                      <option value='0'>- Digite o Macrotema -</option>
                      @if($coupon->type_coupon == 'macrotema')
                        @foreach($coupon->type_id as $type_id)

                          @if($category->find($type_id)->category_id == NULL)
                          <option value="{{$type_id}}" selected>{{$category->find($type_id)->name}}</option>
                          @endif
                        @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="col-xs-6 subcateg">
                    <label for="type_id">Subcategoria</label>
                    <select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
                      <option value='0'>- Digite a Subcategoria -</option>
                      @if($coupon->type_coupon == 'subcategoria')
                        @foreach($coupon->type_id as $type_id)
                          @if($category->find($type_id)->category_id != NULL)
                          <option value="{{$type_id}}" selected>{{$category->find($type_id)->name}}</option>
                          @endif
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.coupon.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </section>
      <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

  </div>

@stop