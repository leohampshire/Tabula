@extends('admin.templates.default')

@section('title', 'Adicionar Cupom')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Cupom</h1>
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
            <form method="POST" action="{{route('admin.coupon.store')}}" >
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="type_discount">Tipo Desconto</label>
                    <select class="form-control" id="type_discount"  name="type_discount">
                      <option selected disabled hidden>Escolha uma...</option>
                      <option value="porcentagem" @if(old('type_discount') == 'porcentagem') selected @endif>Desconto Porcentagem</option>
                      <option value="dinheiro" @if(old('type_discount') == 'dinheiro') selected @endif>Desconto  Monetário</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="type_coupon">Tipo Cupom</label>
                    <select class="form-control" id="type_coupon" name="type_coupon">
                      <option selected disabled hidden>Escolha uma...</option>
                      <option value="carrinho" @if(old('type_coupon') == 'carrinho') selected @endif>Desconto  fixo de carrinho</option>
                      <option value="produto" @if(old('type_coupon') == 'produto') selected @endif>Desconto fixo de produto</option>
                      <option value="macrotema" @if(old('type_coupon') == 'macrotema') selected @endif>Desconto fixo de Macrotema</option>
                      <option value="subcategoria" @if(old('type_coupon') == 'subcategoria') selected @endif>Desconto fixo de SubCategoria</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="cod_coupon">Código Cupom</label>
                    <input class="form-control" type="text" name="cod_coupon" placeholder="Código Cupom" value="{{ old('cod_coupon') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc_coupon">Descrição Cupom</label>
                    <input class="form-control" name="desc_coupon" type="text" placeholder="Descrição Cupom" value="{{ old('desc_coupon') }}">
                  </div>
                </div> 

                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc_coupon">Limite</label>
                    <input class="form-control" name="limit" type="number" placeholder="Limite (opcional)" value="{{ old('limit') }}">
                  </div>
                </div>     

                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="value_coupon">Valor Cupom</label>
                    <input class="form-control input-money" type="text" id="value_coupon" name="value_coupon" placeholder="Valor Cupom" value="{{ old('value_coupon') }}">
                  </div>
                  <div class="form-group row">
                    <div class="col-xs-12 course">
                      <label for="type_id">Curso</label>
                      <select class="form-control multiple select2" style='width: 400px;' name="type_id[]"  multiple="multiple">
                        <option value='0'>- Digite o Curso -</option>
                      </select>
                    </div>
                    <div class="col-xs-12 macrotema">
                      <label for="type_id">Macrotema</label>
                      <select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
                        <option value='0'>- Digite o Macrotema -</option>
                      </select>
                    </div>
                    <div class="col-xs-12 subcateg">
                      <label for="type_id">SubCategoria</label>
                      <select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
                        <option value='0'>- Digite a SubCategoria -</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.coupon.index')}}">
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