@extends('admin.templates.default')

@section('title', 'Editar Categoria')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Categoria</h1>
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
            <form method="POST" action="{{route('admin.subcategory.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$subcategory->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="category_id">Categoria</label>
                    <select class="form-control" name="category_id">
                      <option value="" selected disabled>SELECIONE...</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}" @if($category->id == $subcategory->category_id)) selected @endif>{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Ex.: Informatica" class="form-control" id="name" value="{{$subcategory->name}}">
                  </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" class="form-control" placeholder="EX.:informatica" id="urn" value="{{$subcategory->urn}}">
                  </div>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.subcategory.index')}}">
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